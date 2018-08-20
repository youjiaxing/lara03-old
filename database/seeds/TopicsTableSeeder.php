<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();

        $category_ids = \App\Models\Category::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)->times(5000)->make()->each(function ($topic, $index) use ($faker, $user_ids, $category_ids) {
            if ($index == 0) {
                // $topic->field = 'value';
            }

            $topic->user_id = $faker->randomElement($user_ids);
            $topic->category_id = $faker->randomElement($category_ids);

        });

        Topic::insert($topics->toArray());
    }

}

