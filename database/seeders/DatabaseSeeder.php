<?php

namespace Database\Seeders;

use App\Http\Controllers\GenreController;
use App\Models\Album;
use App\Models\Artist;
use App\Models\genre;
use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('genres')->delete();

        genre::truncate();

        $genres = [
            [
                'id' => 1,
                'name' => 'روضه',
                'cover_path' => '../img/Rozeh.png'
            ],
            [
                'id' => 2,
                'name' => 'تنظیم دیجیتال',
                'cover_path' => '../img/Tanzim.png'
            ],
            [
                'id' => 3,
                'name' => 'زمینه',
                'cover_path' => '../img/Zamineh.png'
            ],
        ];

        DB::table('genres')->insert($genres);


        DB::table('artists')->delete();

        Artist::truncate();

        $artist = [
            [
                'id' => 1,
                'name' => "حاج محمود کریمی"
            ]
        ];

        DB::table('artists')->insert($artist);

        DB::table('albums')->delete();

        Album::truncate();

        $albums = [
            [
                'id' => 1,
                'name' => "محرم ۱۴۰۲"
            ]
        ];

        DB::table('albums')->insert($albums);

        DB::table('tracks')->delete();

        Track::truncate();

        $tracks = [
            [
                'id' => 1,
                'name' => 'مرده بدم زنده شدم',
                'artist_id' => 1,
                'genre_id' => 1,
                'album_id' => 1,
                'path' => '../mp3/MordeBodam.mp3'
            ],

            [
                'id' => 2,
                'name' => 'جاریه میون رگهام',
                'artist_id' => 1,
                'genre_id' => 2,
                'album_id' => 1,
                'path' => '../mp3/Jarieh.mp3'
            ],

            [
                'id' => 3,
                'name' => 'عجب سروی',
                'artist_id' => 1,
                'genre_id' => 3,
                'album_id' => 1,
                'path' => '../mp3/AjabSarvi.mp3'
            ],

        ];

        DB::table('tracks')->insert($tracks);


        DB::table('users')->delete();

        User::truncate();

        $admin = [
            [
                'id' => 1,
                'username' => 'nafahat',
                'password' => Hash::make('nafahat@123'),
                'role' => 'admin'
            ]
        ];

        DB::table('users')->insert($admin);

    }
}
