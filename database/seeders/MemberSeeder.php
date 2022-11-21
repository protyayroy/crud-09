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
           [ 'id' => 1, 'name' => 'Demo', 'address' => 'Dhaka', 'image' => 'no_img.png'],
           [ 'id' => 2, 'name' => 'Demo2', 'address' => 'Khulna', 'image' => 'no_img.png'],
           [ 'id' => 3, 'name' => 'Demo3', 'address' => 'Jhenaidah', 'image' => 'no_img.png'],
           [ 'id' => 4, 'name' => 'Demo4', 'address' => 'Magura', 'image' => 'no_img.png']
        ];

        Member::insert($memberInfo);
    }
}
