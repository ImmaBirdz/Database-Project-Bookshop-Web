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
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 1
            ],
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 1
            ],
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 5
            ],
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 8
            ],
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 15
            ],
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 5
            ],
            [
                'wishlist_id' => 2,
                'user_id' => 2,
                'book_id' => 10
            ],
        ]);
    }
}
