<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::truncate();

        $authors = [
            ["name" => "Harper Lee"],
            ["name" => "J.D. Salinger"],
            ["name" => "F. Scott Fitzgerald"],
            ["name" => "William Golding"],
            ["name" => "Lois Lowry"],
            ["name" => "George Orwell"],
            ["name" => "Aldous Huxley"],
            ["name" => "John Steinbeck"],
            ["name" => "Ramit Sethi"],
            ["name" => "Orson Scott Card"],
        ];

        foreach($authors as $author) {
            Author::create($author);
        }
    }
}
