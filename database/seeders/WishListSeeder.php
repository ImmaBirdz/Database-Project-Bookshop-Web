<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WishListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wishlists')->insert([
            ['user_id' => 1, 'book_id' => 1],
            ['user_id' => 2, 'book_id' => 1],
            ['user_id' => 2, 'book_id' => 5],
            ['user_id' => 3, 'book_id' => 8],
            ['user_id' => 4, 'book_id' => 15],
            ['user_id' => 5, 'book_id' => 5],
            ['user_id' => 6, 'book_id' => 10],
        ]);
    }
}
