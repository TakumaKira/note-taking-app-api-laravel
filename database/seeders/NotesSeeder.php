<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notes;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Notes::create([
                'title' => $faker->sentence,
                'content' => $faker->text,
            ]);
        }
    }
}
