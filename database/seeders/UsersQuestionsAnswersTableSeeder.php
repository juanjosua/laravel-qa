<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('answers')->delete();
      \DB::table('questions')->delete();
      \DB::table('users')->delete();

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
