<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Francisco',
            'email' => 'franmavazq@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Carlos',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Juana',
            'email' => 'juana@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
    }
}
