<?php

namespace Database\Seeders;

use App\Models\admin\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name'=>'Admin',
           'email'=>'admin@gmail.com',
           'position'=>ADMIN_POSITION,
           'role'=>ADMIN_ROLE,
           'password'=>Hash::make('12345678'),
            'status'=>ACTIVE_STATUS
        ]);
    }
}
