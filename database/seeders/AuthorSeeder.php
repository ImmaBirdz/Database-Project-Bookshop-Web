<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'author_id' => 1,
                'author_name' => 'Fyodor Dostoevsky',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 2,
                'author_name' => 'Albert Camus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 3,
                'author_name' => 'Hanya Yanagihara',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 4,
                'author_name' => 'George Orwell',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 5,
                'author_name' => 'Franz Kafka',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 6,
                'author_name' => 'E.M.Forster',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 7,
                'author_name' => 'Margaret Atwood',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'author_id' => 8,
                'author_name' => 'Louisa May Alcott',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
