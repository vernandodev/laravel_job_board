<?php

namespace Database\Seeders;


use App\Models\Listing;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         User::factory(10)->create();
//         Tag::factory(10)->create();
//         Listing::factory(10)->create();

        $tags = Tag::factory(10)->create();

        User::factory(20)->create()->each(function ($user) use($tags){
            Listing::factory(rand(1, 4))->create([
                'user_id' => $user->id
            ])->each(function($listing) use($tags){
                $listing->tags()->attach($tags->random(2));
            });
        });
    }
}
