<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::truncate();

        $publishers = [
            ["name" => "J. B. Lippincott & Co."],
            ["name" => "Little, Brown"],
            ["name" => "Charles Scribner Sons"],
            ["name" => "Faber and Faber"],
            ["name" => "Houghton Mifflin"],
            ["name" => "Secker & Warburg"],
            ["name" => "Chatto & Windus"],
            ["name" => "Covici Friede"],
            ["name" => "Workman"],
            ["name" => "Tor Books"],
        ];

        foreach($publishers as $publisher) {
            Publisher::create($publisher);
        }
    }
}
