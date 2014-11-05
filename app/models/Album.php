<?php

class Album extends \Eloquent {

    protected $fillable = ['name', 'area_id', 'description'];
    protected $table = 'albums';

    const ALBUMS_PATH = 'uploads/albums'; // albums/:id/origin & albums/:id/thumb
    const ORIGIN_DIR = 'origin';
    const THUMB_DIR = 'thumb';
    const PER_PAGE = 15;

    public static $rules = array(
        'name' => 'required'
    );

    public static function boot() {
        parent::boot();
        static::saving(function($album) {
                    if (!$album->slug) {
                        $album->slug = slug_string($album->name);
                    }
                    if (!$album->area_id) {
                        $album->area_id = NULL;
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

    public static function loadOrSearch($options = []) {
        $query = self::select('*')->with('area', 'photos');

        if (isset($options['area_id'])) {
            $area_id = trim($options['area_id']);
            if ($area_id != 'all') {
                if ($area_id == '') {
                    $query = $query->where('area_id', NULL);
                } else {
                    $query = $query->where('area_id', $area_id);
                }
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
        return $prefix . self::ALBUMS_PATH . '/' . $this->id . '/' . self::ORIGIN_DIR . '/';
    }

    public function thumbPhotoPath($absolute = true) {
        $prefix = '';
        if ($absolute) {
            $prefix = public_path() . '/';
        }
        return $prefix . self::ALBUMS_PATH . '/' . $this->id . '/' . self::THUMB_DIR . '/';
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

}