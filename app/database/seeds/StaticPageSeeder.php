<?php

class StaticPageSeeder extends Seeder {

    public function run() {
        $pages = [
            'why-travel-with-us' => 'Why travel with us',
            'terms-and-condition' => 'Terms And Condition',
            'faq' => 'FAQ',
            'join-our-team' => 'Join Our Team',
            'travel-album' => 'Travel album',
            'about-us' => 'About Us'
        ];
        foreach ($pages as $name => $title) {
            DB::table('static_pages')->insert([
                'name' => $name,
                'title' => $title,
                'content' => $title . ' content ...'
            ]);
        }
    }

}

?>
