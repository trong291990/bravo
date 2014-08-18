<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();
        $this->call('CountryAndPlaceSeeder');
        $this->call('TravelStylesTableSeeder');
    }

}

class CountryAndPlaceSeeder extends Seeder {

    public function run() {
        DB::table('areas')->truncate();
        DB::table('places')->truncate();
        $indochinaArea = Area::create([
                    'name' => 'Indochina',
                    'is_on_menu' => true,
                    'menu_order' => 0,
                    'keyword' => 'Indochina'
        ]);
        $area_places = [
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
            ]
        ];
        $i = 0;
        foreach ($area_places as $areaName => $places) {
            $area = Area::create([
                        'name' => $areaName,
                        'is_on_menu' => true,
                        'menu_order' => ++$i,
                        'keyword' => $areaName,
                        'parent_id' => $indochinaArea->id
            ]);
            foreach ($places as $place) {
                Place::create([
                    'name' => $place,
                    'area_id' => $area->id
                ]);
            }
        }
    }

}

