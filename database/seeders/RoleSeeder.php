<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'fname' => 'admin',
            'lname'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role_type'=>'admin',
        ]);
        DB::table('users')->insert([
            'fname' => 'Staff',
            'lname'=>'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123'),
            'role_type'=>'staff',
        ]);


    }
}
