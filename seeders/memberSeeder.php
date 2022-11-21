<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberInfo = [
           [ 'id' => 1, 'name' => 'Demo', 'address' => 'Dhaka', 'image' => ''],
           [ 'id' => 2, 'name' => 'Demo2', 'address' => 'Khulna', 'image' => ''],
           [ 'id' => 3, 'name' => 'Demo3', 'address' => 'Jhenaidah', 'image' => ''],
           [ 'id' => 4, 'name' => 'Demo4', 'address' => 'Magura', 'image' => '']
        ];

        Member::insert($memberInfo);
    }
}
