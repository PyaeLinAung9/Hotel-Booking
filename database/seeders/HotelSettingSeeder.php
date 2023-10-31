<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HotelSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_settings')->truncate();
        DB::table('hotel_settings')->insert([
            'id'                => '1',
            'name'              => 'Hotel Barmuda',
            'occupancy'         => 'person(s)',
            'email'             => 'barmuda@gamil.com' ,
            'online_number'     => '+95 096287323',
            'outline_number'    => '01 79422 739',
            'check_in'          => '12:00 pm',
            'check_out'         => '02:00 pm',
            'price_unit'        => 'dollers',
            'size_unit'         => 'm2',
            'address'           => '203 Fake St. Mountain View, San Francisco, California, USA',
            'image'             => '',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
        ]);
    }
}
