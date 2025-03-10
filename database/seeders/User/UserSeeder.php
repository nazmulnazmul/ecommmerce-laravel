<?php

namespace Database\Seeders\User;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'is_admin' => 1,
                'mobile' => '01704357422',
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString()
            ]);
    }
}
