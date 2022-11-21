<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PASSWORD: 11111111
        $userInfo = [
            [ 'id' => 1, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '$2a$12$7RBYaEJJvPAKKUmI1HKBjeXtU1M6AhNuwIsnzsQOfu4KwhBTuLraC',]
         ];

         User::insert($userInfo);
    }
}
