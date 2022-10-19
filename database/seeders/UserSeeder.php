<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alhasan Salem',
            'email' => 'alhasan1997@hotmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '01116554246'
        ]);

        DB::table('users')->insert([
            'name' => 'helper',
            'email' => 'alhasanshakra@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '01116554242'
        ]);
    }
}
