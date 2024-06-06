<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'FullName' => 'AdminCenter1',
                'email' => 'AdminCenter1@frigotools.com',
                'password' => Hash::make('1010'),
            ],
            [
                'FullName' => 'AdminCenter2',
                'email' => 'AdminCenter2@frigotools.com',
                'password' => Hash::make('1010'),
            ]
        ];
        Admin::insert($admins);
    }
}
// php artisan db:seed --class=AdminSeeder
