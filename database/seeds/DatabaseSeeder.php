<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(TopicsTableSeeder::class);
        // $this->call(QuestionsTableSeeder::class);
        // $this->call(OptionsTableSeeder::class);

        
    }
}
