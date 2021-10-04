<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->has(Album::factory(100))
//            ->has(Photo::factory(1000))) // don't do this ))
            ->create();


        foreach (Album::all() as $album) {
            $photos = Photo::factory(1000)->make([
                'album_id' => $album->id
            ])->toArray();
            DB::table('photos')->insert($photos);
        }
    }
}
