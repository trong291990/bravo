<?php

trait SlugIdentifiableTrait {

    public static function findBySlug($slug) {
        return self::where('slug', 'LIKE', '%' . $slug . '%')->first();
    }

}
