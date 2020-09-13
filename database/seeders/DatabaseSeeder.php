<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Models\User::factory(3)->create()->each(function($u) {
          $u->questions()
            ->saveMany(
              Models\Question::factory(rand(1, 5))->make()
            )
            ->each(function($q) {
              $q->answers()
                ->saveMany(
                  Models\Answer::factory(rand(1, 5))->make()
                );
            });
        });
    }
}
