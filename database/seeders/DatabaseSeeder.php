<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        App\Models\User::factory()->count(5)->create();
        App\Models\Poll::factory()->count(30)->create();
        App\Models\Question::factory()->count(50)->create();
        App\Models\Answer::factory()->count(500)->create();
    }
}
