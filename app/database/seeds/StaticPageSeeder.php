<?php

class StaticPageSeeder extends Seeder {

    public function run() {
        DB::table('static_pages')->truncate();
        foreach (StaticPage::$VALID_NAMES as $page_name) {
            $title = str_replace('-', ' ', $page_name);
            DB::table('static_pages')->insert([
                'name' => $page_name,
                'title' => ucwords($title),
                'content' => 'Sample content ...'
            ]);
        }
    }

}

?>
