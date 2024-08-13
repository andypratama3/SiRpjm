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

        $rt = User::create([
            'name' => 'rt',
            'email' => 'rt@gmail.com',
            'password' => Hash::make('rt1234'),
            'jabatan' => 'rt',
            'nomor' => '1',
            'email_verified_at' => now(),
        ]);

        $rt->assignRole('rt');

        $rw = User::create([
            'name' => 'rw',
            'email' => 'rw@gmail.com',
            'password' => Hash::make('rw1234'),
            'jabatan' => 'rt',
            'nomor' => '1',
            'email_verified_at' => now(),
        ]);

        $rw->assignRole('rw');


        $pemdes = User::create([
            'name' => 'pemdes',
            'email' => 'pemdes@gmail.com',
            'password' => Hash::make('pemdes1234'),
            'email_verified_at' => now(),
        ]);

        $pemdes->assignRole('pemdes');
    }
}
