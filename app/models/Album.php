<?php

class Album extends \Eloquent {
use CommentableTrait;

    protected $fillable = ['name', 'area_id', 'description', 'type', 'is_published'];
    protected $table = 'albums';

    const ALBUMS_PATH = 'uploads/albums'; // albums/:id/origin & albums/:id/thumb
    const ORIGIN_DIR = 'origin';
    const THUMB_DIR = 'thumb';
    const PER_PAGE = 15;
    const TYPE_CITY = 'city_attraction';
    const TYPE_HOTEL = 'hotel_resort';
    const TYPE_TRAVELLER = 'traveller';
    const TYPE_OTHER = 'other';

    public static $rules = array(
        'name' => 'required'
    );

    public static function boot() {
        parent::boot();
        static::saving(function($album) {
            $album->slug = slug_string($album->name);
            if (!$album->area_id) {
                $album->area_id = NULL;
            }
            if (!$album->type) {
                $album->type = self::TYPE_OTHER;
            }
        });

        static::created(function($album) {
            File::makeDirectory($album->originPhotoPath(), 0777, true, true);
            File::makeDirectory($album->thumbPhotoPath(), 0777, true, true);
        });
        static::deleted(function($album) {
            $album->photos()->delete();
            // Delete album directory
            File::deleteDirectory(public_path(self::ALBUMS_PATH . '/' . $album->id));
        });
    }

    public static function availableTypes() {
        return [
            self::TYPE_CITY, self::TYPE_HOTEL,
            self::TYPE_TRAVELLER, self::TYPE_OTHER
        ];
    }

    public static function typesLabelsMap($includeOther = true) {
        $arr = [
            self::TYPE_CITY => 'City Attraction',
            self::TYPE_HOTEL => 'Hotel & Resort',
            self::TYPE_TRAVELLER => 'Traveller Album'
        ];
        if ($includeOther) {
            $arr[self::TYPE_OTHER] = 'Other';
        }
        return $arr;
    }

    public static function isValidType($type) {
        return in_array($type, self::availableTypes());
    }

    public static function recent($count = 8) {
        return self::with('area')->orderBy('created_at', 'DESC')->take($count)->get();
    }

    public static function loadOrSearch($options = []) {
        $query = self::select('*')->with('area', 'photos');

        if (isset($options['area_id'])) {
            $area_id = trim($options['area_id']);
            if ($area_id != '') {
                $query = $query->where('area_id', $area_id);
            }
        }

        if (isset($options['type']) && trim($options['type'])) {
            $type = trim($options['type']);
            if (self::isValidType($type)) {
                $query = $query->where('type', $type);
            }
        }

        if (isset($options['keyword']) && trim($options['keyword'])) {
            $keyword = '%' . trim($options['keyword']) . '%';
            $query = $query->where(function($query) use($keyword) {
                $query->where('name', 'LIKE', $keyword);
            });
        }
        return $query->orderBy('created_at', 'DESC')->paginate(self::PER_PAGE);
    }

    public static function createTravellerAlbum($name) {
        $album = new Album(['name' => $name]);
        $album->type = self::TYPE_TRAVELLER;
        $album->is_published = false;
        $album->area_id = Area::first()->id;
        $album->save();
        return $album;
    }
    /*
     * Scope by types
     */

    public function scopeWithType($query, $type) {
        return $query->where('type', $type);
    }

    public function scopeCity($query) {
        return $query->where('type', self::TYPE_CITY);
    }

    public function scopeHotel($query) {
        return $query->where('type', self::TYPE_HOTEL);
    }

    public function scopeTraveller($query) {
        return $query->where('type', self::TYPE_TRAVELLER);
    }

    /*
     * More scopes
     */

    public function scopePublished($query) {
        return $query->where('is_published', true);
    }

    public function scopeMostView($query, $count = 8) {
        return $query->orderBy('views', 'DESC')->take($count);
    }

    public function scopeWithAreaID($query, $area_id) {
        return $query->where('area_id', $area_id);
    }

    public function scopeWithKeyword($query, $keyword) {
        return $query->where('name', 'LIKE', '%' . $keyword . '%');
    }

    public function typeLabel() {
        $labels = self::typesLabelsMap();
        try {
            return $labels[$this->type];
        }  catch (Exception $e) {
            return "Other";
        }
    }

    public function area() {
        return $this->belongsTo('Area', 'area_id');
    }

    public function photos() {
        return $this->hasMany('AlbumPhoto', 'album_id');
    }

    public function primaryPhoto() {
        $primaryPhoto = $this->photos()->where('is_primary', true)->first();
        if (!$primaryPhoto) {
            $primaryPhoto = $this->photos()->first();
        }
        return $primaryPhoto;
    }

    public function originPhotoPath($absolute = true) {
        $prefix = '';
        if ($absolute) {
            $prefix = public_path() . '/';
        }
        return $prefix . self::ALBUMS_PATH . '/' . self::ORIGIN_DIR . '/' . $this->id . '/';
    }

    public function thumbPhotoPath($absolute = true) {
        $prefix = '';
        if ($absolute) {
            $prefix = public_path() . '/';
        }
        return $prefix . self::ALBUMS_PATH . '/' . self::THUMB_DIR . '/' . $this->id . '/';
    }

    public function uploadPhoto($uploadedFile) {
        $ext = $uploadedFile->guessExtension(); // What if null ?
        // Randomize filename
        $fileName = md5(microtime(true) . $uploadedFile->getClientOriginalName());
        $originFileName = $fileName . '.' . $ext;
        $thumbFileName = $fileName . 't.' . $ext;
        // Move and create original
        $uploadedFile->move($this->originPhotoPath(), $originFileName);
        // Make thumb
        Image::make($this->originPhotoPath() . $originFileName)
            ->resize(300, 200)
            ->save($this->thumbPhotoPath() . $thumbFileName);
        // Save to DB
        $photo = new AlbumPhoto;
        $photo->album_id = $this->id;
        $photo->origin_path = $this->originPhotoPath(false) . $originFileName;
        $photo->thumb_path = $this->thumbPhotoPath(false) . $thumbFileName;
        $photo->save();
        return $photo;
    }

    public function uploadPhotos($uploadedFiles) {
        foreach ($uploadedFiles as $photo) {
            $this->uploadPhoto($photo);
        }
    }

    public function increaseViews() {
        $this->views += 1;
        $this->save();
    }

    public function zippedFileName() {
        return $this->slug . '-album.zip';
    }

    public function getZippedPath() {
        $dirPath = $this->originPhotoPath();
        $zippedFilePath = $dirPath . str_random(32) . '.zip';

        $zipArchive = new ZipArchive();
        if ($zipArchive->open($zippedFilePath, ZIPARCHIVE::OVERWRITE)) {
            foreach (glob($dirPath . "/*.{jpeg,png,gif,JPEG,PNG,GIF}", GLOB_BRACE) as $file) {
                $new_filename = substr($file, strrpos($file, '/') + 1);
                $zipArchive->addFile($file, $new_filename);
            }
            $zipArchive->close();
            return $zippedFilePath;
        } else {
            return null;
        }
    }

}
