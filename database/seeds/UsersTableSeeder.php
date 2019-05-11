<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 30)->create();
        
        User::create([
            'name' => 'Eduardo Cavalcante',
            'email' => 'epscavalcant@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}