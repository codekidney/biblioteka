<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name'              => 'Hobbit',
            'year'              => '2010',
            'pages'             => '310',
            'price'             => '29.99',
            'publication_place' => 'Warszawa',
        ]);
        DB::table('books')->insert([
            'name'              => 'Kolor magii',
            'year'              => '2005',
            'pages'             => '425',
            'price'             => '39.99',
            'publication_place' => 'Katowice',
        ]);
        DB::table('books')->insert([
            'name'              => 'Władca Pierścieni',
            'year'              => '1999',
            'pages'             => '520',
            'price'             => '45.99',
            'publication_place' => 'Kraków',
        ]);
    }
}
