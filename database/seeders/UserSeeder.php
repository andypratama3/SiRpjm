<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $panitia = User::create([
            'name' => 'panitia',
            'email' => 'panitia@gmail.com',
            'password' => Hash::make('panitia1234'),
            'email_verified_at' => now(),
        ]);

        $panitia->assignRole('panitia');

        $warga = User::create([
            'name' => 'warga',
            'email' => 'warga@gmail.com',
            'password' => Hash::make('warga1234'),
            'email_verified_at' => now(),
        ]);

        $warga->assignRole('warga');


        $pemdes = User::create([
            'name' => 'pemdes',
            'email' => 'pemdes@gmail.com',
            'password' => Hash::make('pemdes1234'),
            'email_verified_at' => now(),
        ]);

        $pemdes->assignRole('pemdes');
    }
}
