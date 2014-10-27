<?php

use \Filesystem;

class Album extends \Eloquent {

    protected $fillable = ['name', 'category_id', 'description'];
    protected $table = 'albums';

    const PHOTO_PATH = 'uploads/albums'; // albums/:id/origin & albums/:id/thumb
    const ORIGIN_DIR = 'origin';
    const THUMB_DIR = 'thumb';

    public static function boot() {
        parent::boot();
        static::creating(function($album) {
                    if (!$album->slug) {
                        $album->slug = slug_string($album->name);
                    }
                    if (!$album->category_id) {
                        $album->category_id = NULL;
                    }
                });

        static::created(function($album) {
                    File::makeDirectory($album->originPhotoPath(), 0666, true, true);
                    File::makeDirectory($album->thumbPhotoPath(), 0666, true, true);
                });
        static::deleted(function($album) {
                    // TODO: Delete files
                });
    }

    public static $rules = array(
        'name' => 'required'
    );

    public function category() {
        return $this->belongsTo('AlbumCategory', 'category_id');
    }

    public function originPhotoPath($absolute = true) {
        $prefix = '';
        if ($absolute) {
            $prefix = public_path() . '/';
        }
        return $prefix . self::PHOTO_PATH . '/' . $this->id . '/' . self::ORIGIN_DIR . '/';
    }

    public function thumbPhotoPath($absolute = true) {
        $prefix = '';
        if ($absolute) {
            $prefix = public_path() . '/';
        }
        return $prefix . self::PHOTO_PATH . '/' . $this->id . '/' . self::THUMB_DIR . '/';
    }

    public function uploadPhoto($uploadedFile, $title, $isPrimary = false) {
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
        $photo->title = $title;
        $photo->origin_path = $this->originPhotoPath(false) . $originFileName;
        $photo->thumb_path = $this->thumbPhotoPath(false) . $thumbFileName;
        $photo->is_primary = $isPrimary;
        $photo->save();

        return $photo;
    }

}