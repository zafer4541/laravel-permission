<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Permissions\Permissions as Perm;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions=new Perm;
        foreach($permissions->getPermissions() as $key=>$value){
             Permission::create(['name' => 'read '.$key]);
            Permission::create(['name' => 'create '.$key]);
            Permission::create(['name' => 'update '.$key]);
            Permission::create(['name' => 'delete '.$key]);
        }
   
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleSuperAdmin->givePermissionTo(Permission::all());
        $superAdmin=User::find(1);
        $superAdmin->assignRole('super-admin');

        Role::create(['name' => 'writer']);
        Role::create(['name' => 'employee']);
    }
}
