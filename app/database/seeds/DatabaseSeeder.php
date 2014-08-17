<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();
        $this->call('CountryAndPlaceSeeder');
    }

}

class CountryAndPlaceSeeder extends Seeder {

    public function run() {
        DB::table('countries')->truncate();
        DB::table('places')->truncate();
        $countries_places = [
            'Vietnam' => [
                'HaLong Bay', 'Hanoi', 'Da Lat', 'Phong Nha Ke Bang',
                'Hoi An', 'Hue', 'Lang Co', 'Con Dao Islands', 'Nha Trang',
                'Saigon', 'Phu Quoc'
            ],
            'Cambodia' => [
                'Ban Lung', 'Banteay Chhmar', 'Battambang',
                'Kampot', 'Kep', 'Koh Kong', 'Kratie & Chhlong',
                'Mondulkiri', 'Phnom Penh',
                'Ratanakiri', 'Sen Monorom', 'Siem Reap', 'Sihanoukville',
                'Temples of Angkor'
            ],
            'Laos' => [
                'Bolaven Plateau', 'Champasak', 'Champasak Province', 'The Far North',
                'Hin Boun', 'Khammuan & Savannakhet', 'Luang Nam Tha', 'Luang Prabang',
                'Muang La', 'Nong Khiaw', 'Pakbeng', 'Pakse', 'The Plain of Jars',
                'Sam Neau', 'Tad Lo', 'Thakek', 'Vang Vieng', 'Vientiane'
            ],
            'Indochina' => [
            ]
        ];
        $i = 0;
        foreach ($countries_places as $countryName => $places) {
            $country = Country::create([
                        'name' => $countryName,
                        'is_on_menu' => true,
                        'menu_order' => ++$i,
                        'keyword' => $countryName
            ]);
            foreach ($places as $place) {
                Place::create([
                    'name' => $place,
                    'country_id' => $country->id
                ]);
            }
        }
    }

}

class TravelStyleSeeder extends Seeder {

    public function run() {
        DB::table('travel_styles')->truncate();
    }

}