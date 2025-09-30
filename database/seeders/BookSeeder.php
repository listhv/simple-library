<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Laut bercerita',
                'author' => 'Leila S. Chudori',
                'year' => 2017,
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'year' => 2019,
            ],
            [
                'title' => 'Filosofi Teras',
                'author' => 'Henry Manampiring',
                'year' => 2018,
            ],
            [
                'title' => 'Cantik itu luka',
                'author' => 'Eka Kurniawan',
                'year' => 2002,
            ],
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'year' => 2005,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
