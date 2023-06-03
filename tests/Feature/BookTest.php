<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_cannot_access_book_edit_page()
    {
        $user = User::factory()->create([
            'email' => 'useraccesseditpage@test.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $response = $this->get('/admin/books/edit/1');
        $response->assertStatus(403);
    }

    public function test_user_cannot_edit_book()
    {
        $user = User::factory()->create([
            'email' => 'usereditbook@test.com',
            'password' => bcrypt('password'),
        ]);

        $data = [
            'publisher_id' => 3,
            'author_id' => 2,
            'title' => 'This Should Not Work',
            'description' => 'Users cannot edit books',
            'cover_photo' => 'https://www.alimentarium.org/sites/default/files/media/image/2017-02/AL027-01_pomme_de_terre_0_0.jpg',
            'price' => 41.52,
        ];

        $this->actingAs($user);

        $response = $this->put('/admin/books/1', $data);
        $response->assertStatus(403);
    }

    public function test_user_cannot_delete_book()
    {
        $user = User::factory()->create([
            'email' => 'userdeletebook@test.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $response = $this->delete('/admin/books/1');
        $response->assertStatus(403);
    }

    public function test_manager_can_access_book_edit_page()
    {
        $user = User::factory()->create([
            'email' => 'managereditbook@test.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        $data = [
            'publisher_id' => 3,
            'author_id' => 2,
            'title' => 'This Should Not Work',
            'description' => 'Users cannot edit books',
            'cover_photo' => 'https://www.alimentarium.org/sites/default/files/media/image/2017-02/AL027-01_pomme_de_terre_0_0.jpg',
            'price' => 41.52,
        ];

        $this->actingAs($user);

        $response = $this->get('/admin/books/edit/1');
        $response->assertStatus(200);
    }

    public function test_manager_can_edit_book()
    {
        $user = User::factory()->create([
            'email' => 'managercaneditbook@test.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        $data = [
            'publisher_id' => 3,
            'author_id' => 2,
            'title' => 'This Should Definitely Work',
            'description' => 'Managers can edit books',
            'cover_photo' => 'https://www.alimentarium.org/sites/default/files/media/image/2017-02/AL027-01_pomme_de_terre_0_0.jpg',
            'price' => 95.52,
        ];

        $this->actingAs($user);

        $response = $this->put('/admin/books/1', $data);
        $response->assertStatus(302);
    }

    public function test_manager_can_delete_book()
    {
        $user = User::factory()->create([
            'email' => 'managerdeletebook@test.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        $this->actingAs($user);

        $response = $this->delete('/admin/books/1');
        $response->assertStatus(302);
    }
}
