<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'nik' => '282821',
            'address' => 'jl',
            'phone' => '08123456789',
            'birth_place' => 'Bandung',
            'birth_day' => '1997/07/28',
            'domisili' => 'Bandung',
            'email' => 'admin@email.com',
            'password' => bcrypt('123'),
            'chapter_id' => 1
        ]);
        $admin->assignRole('admin');

        $member_merchant = User::create([
            'name' => 'Member Merchan',
            'nik' => '1228',
            'address' => 'jl',
            'phone' => '08123456789',
            'birth_place' => 'Bandung',
            'birth_day' => '1997/07/28',
            'domisili' => 'Bandung',
            'email' => 'member_merchant@email.com',
            'password' => bcrypt('123'),
            'chapter_id' => 1
        ]);
        $member_merchant->assignRole('member-merchant');
    }
}
