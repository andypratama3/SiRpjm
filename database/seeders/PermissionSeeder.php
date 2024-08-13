<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // mengusulkan permission
            'mengusulkan-create',
            'mengusulkan-edit',
            'mengusulkan-delete',
            'mengusulkan-show',
            'mengusulkan-index',
            'mengusulkan-store',
            'mengusulkan-update',

            // hasil permission
            'hasil-create',
            'hasil-edit',
            'hasil-delete',
            'hasil-show',
            'hasil-index',
            'hasil-store',
            'hasil-update',

            //status mengusulkan
            'mengusulkan-status',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'admin',
            'panitia',
            'warga',
            'pemdes',
            'rt',
            'rw',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Assign permissions
        $admin = Role::where('name', 'admin')->first();
        $admin->syncPermissions($permissions);

        $panitia = Role::where('name', 'panitia')->first();
        $panitia->syncPermissions($permissions);

        $pemdes = Role::where('name', 'pemdes')->first();
        $pemdes->syncPermissions([
            'mengusulkan-show',
            'mengusulkan-index',
            'hasil-show',
            'hasil-index',
        ]);

        $rt = Role::where('name', 'rt')->first();
        $rt->syncPermissions([
            'mengusulkan-create',
            'mengusulkan-edit',
            'mengusulkan-delete',
            'mengusulkan-show',
            'mengusulkan-index',
            'mengusulkan-store',
            'mengusulkan-update',
            'hasil-create',
            'hasil-edit',
            'hasil-delete',
            'hasil-show',
            'hasil-index',
            'hasil-store',
            'hasil-update',
        ]);

        $rw = Role::where('name', 'rw')->first();
        $rw->syncPermissions([
            'mengusulkan-create',
            'mengusulkan-edit',
            'mengusulkan-delete',
            'mengusulkan-show',
            'mengusulkan-index',
            'mengusulkan-store',
            'mengusulkan-update',
            'hasil-create',
            'hasil-edit',
            'hasil-delete',
            'hasil-show',
            'hasil-index',
            'hasil-store',
            'hasil-update',
        ]);



        Log::info('Roles and permissions have been seeded successfully.');
    }
}
