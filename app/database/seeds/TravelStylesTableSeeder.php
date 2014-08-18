<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TravelStylesTableSeeder extends Seeder {

    public function run() {
        DB::table('travel_styles')->truncate();
        $styles = ['Day Trip & Short Break', 'Honeymoon Ideas', 'Beach and Relaxion',
            'Cruise', 'Adventure & Off the Beaten Track', 'Family Holiday',
            'Classic Highlight', 'Rail Journey', 'Luxury Holidays', 'Special Themes'];
        foreach ($styles as $s) {
            TravelStyle::create([
                'name' => $s
            ]);
        }
    }

}