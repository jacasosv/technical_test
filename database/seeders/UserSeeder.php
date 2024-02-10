<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("email","admin@admin.com")->first();

        if(empty($user)) {

            User::create([
                "name" => "Administrator",
                "email" => "admin@admin.com",
                "password" => Hash::make('1234567890')
            ]);
        }
    }
}
