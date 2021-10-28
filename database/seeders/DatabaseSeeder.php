<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lana Saiful Aqil',
            'email' => 'lanasaiful411@gmail.com',
            'password' => bcrypt('password'),
            'description' => 'Mahasiswa Semester 3 Universitas Gadjah Mada jurusan Teknologi Rekayasa Perangkat Lunak',
            'photo' => '/img/people/lana_saiful_aqil.png'
        ]);

        Post::create([
            'user_id' => 1,
            'judul' => 'Hello World',
            'slug' => 'hello-world',
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci corrupti quod, consectetur assumenda consequuntur repudiandae eveniet iste fuga perferendis aut, quia culpa vel sint quas natus quis, expedita sapiente temporibus!",
            'thumbnail' => '/img/thumbnail/hello_world.jpeg'
        ]);
    }
}
