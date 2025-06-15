<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use App\Models\User;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view dashboard',
            'create invoice',
            'view invoices',
            'create tickets',
            'view tickets',
            'crud data',
            'view users',
            'manage users'
        ];

        foreach ($permissions as $permission)
        {
            Permission::firstOrCreate(['name'=> $permission]);
        }

        $admin = Role::firstOrCreate(['name'=> 'admin']);
        $owner = Role::firstOrCreate(['name'=> 'owner']);

        $admin->givePermissionTo(Permission::all());
        $owner->givePermissionTo(['view dashboard', 'create invoice', 'create tickets']);

        $user = User::find(1);
        if ($user && !$user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}
