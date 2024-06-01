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
            'email' => 'admin@email.com',
            'password' => bcrypt('123')
        ]);
        $admin->assignRole('admin');

        $member_merchant = User::create([
            'name' => 'Member Merchan',
            'email' => 'member_merchant@email.com',
            'password' => bcrypt('123')
        ]);
        $member_merchant->assignRole('member-merchant');
    }
}
