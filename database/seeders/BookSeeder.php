<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'book_id' => 1, 
                'book_title' => 'White Night', 
                'book_category' => 'Fiction', 
                'book_price' => 200, 
                'book_status' => true,
            ],
            [
                'book_id' => 2, 
                'book_title' => 'The Fall', 
                'book_category' => 'Fiction', 
                'book_price' => 650, 
                'book_status' => true,
            ],
            [
                'book_id' => 3, 
                'book_title' => 'A Little Life', 
                'book_category' => 'Fiction', 
                'book_price' => 550, 
                'book_status' => true,
            ],
            [
                'book_id' => 4, 
                'book_title' => '1984', 
                'book_category' => 'Fiction', 
                'book_price' => 500, 
                'book_status' => true,
            ],
            [
                'book_id' => 5, 
                'book_title' => 'Letters to Milena', 
                'book_category' => 'Non-Fiction', 
                'book_price' => 650, 
                'book_status' => true,
            ],
            [
                'book_id' => 6, 
                'book_title' => 'Maurice', 
                'book_category' => 'Fiction', 
                'book_price' => 650, 
                'book_status' => true,
            ],
            [
                'book_id' => 7, 
                'book_title' => 'The Meek One', 
                'book_category' => 'Fiction', 
                'book_price' => 200, 
                'book_status' => true,
            ],
            [
                'book_id' => 8, 
                'book_title' => 'Letters to His Father', 
                'book_category' => 'Non-Fiction', 
                'book_price' => 900, 
                'book_status' => true,
            ],
            [
                'book_id' => 9, 
                'book_title' => 'The Diary', 
                'book_category' => 'Non-Fiction', 
                'book_price' => 1500, 
                'book_status' => true,
            ],
            [
                'book_id' => 10, 
                'book_title' => 'The Handmaids Tale', 
                'book_category' => 'Fiction', 
                'book_price' => 650, 
                'book_status' => true,
            ],
            [
                'book_id' => 11, 
                'book_title' => 'Little Women', 
                'book_category' => 'Fiction', 
                'book_price' => 650, 
                'book_status' => true,
            ],
            [
                'book_id' => 12, 
                'book_title' => 'Caligula and Three Other Plays', 
                'book_category' => 'Fiction', 
                'book_price' => 650, 
                'book_status' => true,
            ],
            [
                'book_id' => 13, 
                'book_title' => 'The Poor Folks', 
                'book_category' => 'Fiction', 
                'book_price' => 550, 
                'book_status' => true,
            ],
            [
                'book_id' => 14, 
                'book_title' => 'Animal Farm', 
                'book_category' => 'Fiction', 
                'book_price' => 750, 
                'book_status' => true,
            ],
            [
                'book_id' => 15, 
                'book_title' => 'The Metamorphosis', 
                'book_category' => 'Fiction', 
                'book_price' => 550, 
                'book_status' => true,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ],           
        ]);
    }
}
