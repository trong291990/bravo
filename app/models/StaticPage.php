<?php

class StaticPage extends Eloquent {

    protected $table = 'static_pages';
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'meta_keyword', 'meta_description'];
    static $VALID_NAMES = [
        'why-travel-with-us', 'terms-and-condition', 'faq',
        'join-our-team', 'about-us', 'contact', 'responsible-policy'
    ];

    public static function findOrCreateByName($name) {
        $name = trim($name);
        if ((strlen($name) > 0) && in_array($name, self::$VALID_NAMES)) {
            $page = self::where('name', $name)->first();
            $title = str_replace('-', ' ', $name);
            if ($page == null) {
                $page = new static([
                    'title' => ucwords($title),
                    'content' => 'Sample content ...'
                ]);
                $page->name = $name;
                $page->save();
            }
            return $page;
        } else {
            throw new Exception('Invalid page name');
        }
    }

}

?>
