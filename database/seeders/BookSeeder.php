<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();

        $books = [
            [
                "publisher_id" => 1,
                "author_id" => 1,
                "title" => "To Kill A Mockingbird",
                "description" => "Something about mockingbirds",
                "cover_photo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/To_Kill_a_Mockingbird_%28first_edition_cover%29.jpg/1200px-To_Kill_a_Mockingbird_%28first_edition_cover%29.jpg",
                "price" => 1.23,
            ],

            [
                "publisher_id" => 2,
                "author_id" => 2,
                "title" => "The Catcher in the Rye",
                "description" => "A book about someone who did something",
                "cover_photo" => "https://upload.wikimedia.org/wikipedia/commons/8/89/The_Catcher_in_the_Rye_%281951%2C_first_edition_cover%29.jpg",
                "price" => 2.34,
            ],

            [
                "publisher_id" => 3,
                "author_id" => 3,
                "title" => "The Great Gatsby",
                "description" => "A rich guy with a nice house, car and parties.",
                "cover_photo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/The_Great_Gatsby_Cover_1925_Retouched.jpg/542px-The_Great_Gatsby_Cover_1925_Retouched.jpg",
                "price" => 5.23,
            ],

            [
                "publisher_id" => 4,
                "author_id" => 4,
                "title" => "Lord of the Flies",
                "description" => "Surviver as a book.",
                "cover_photo" => "https://m.media-amazon.com/images/I/81WUAoL-wFL._AC_UF1000,1000_QL80_.jpg",
                "price" => 3.15,
            ],

            [
                "publisher_id" => 5,
                "author_id" => 5,
                "title" => "The Giver",
                "description" => "Utopian Society where one person stands out.",
                "cover_photo" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1342493368i/3636.jpg",
                "price" => 6.12,
            ],

            [
                "publisher_id" => 6,
                "author_id" => 6,
                "title" => "Nineteen Eighty-Four",
                "description" => "A Utopian Society",
                "cover_photo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/1984first.jpg/800px-1984first.jpg",
                "price" => 1.25,
            ],

            [
                "publisher_id" => 7,
                "author_id" => 7,
                "title" => "Brave New World",
                "description" => "A boy experiencing a new world. Old meets new.",
                "cover_photo" => "https://upload.wikimedia.org/wikipedia/en/6/62/BraveNewWorld_FirstEdition.jpg",
                "price" => 5.14,
            ],

            [
                "publisher_id" => 8,
                "author_id" => 8,
                "title" => "Of Mice and Men",
                "description" => "2 guys going around doing things.",
                "cover_photo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Of_Mice_and_Men_%281937_1st_ed_dust_jacket%29.jpg/1200px-Of_Mice_and_Men_%281937_1st_ed_dust_jacket%29.jpg",
                "price" => 3.41,
            ],

            [
                "publisher_id" => 9,
                "author_id" => 9,
                "title" => "I Will Teach You To Be Rich",
                "description" => "Describes ways to manage money",
                "cover_photo" => "https://m.media-amazon.com/images/I/71zwHcw-D7L._AC_UF1000,1000_QL80_.jpg",
                "price" => 2.14,
            ],

            [
                "publisher_id" => 10,
                "author_id" => 10,
                "title" => "Enders Game",
                "description" => "A genius kid thinks it is just a game.",
                "cover_photo" => "https://m.media-amazon.com/images/I/81+IUsYtGTL._AC_UF1000,1000_QL80_.jpg",
                "price" => 2.22,
            ],
        ];

        foreach($books as $book) {
            Book::create($book);
        }
    }
}
