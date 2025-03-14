<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publishers')->insert([
            [
                'publisher_id' =>  1,
                'publisher_name' => 'Penguin Classics',
                'publisher_year' => 1935,
                'publisher_country' => 'United Kingdom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'publisher_id' =>  2,
                'publisher_name' => 'Cranford Collection',
                'publisher_year' => 1890,
                'publisher_country' => 'United Kingdom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'publisher_id' =>  3,
                'publisher_name' => 'Everyman_s Library',
                'publisher_year' => 1906,
                'publisher_country' => 'United Kingdom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'publisher_id' =>  4,
                'publisher_name' => 'HarperCollins',
                'publisher_year' => 1989,
                'publisher_country' => 'USA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'publisher_id' =>  5,
                'publisher_name' => 'Vintage Classics',
                'publisher_year' => 1990,
                'publisher_country' => 'United Kingdom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'publisher_id' =>  6,
                'publisher_name' => 'Doubleday',
                'publisher_year' => 1897,
                'publisher_country' => 'USA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
