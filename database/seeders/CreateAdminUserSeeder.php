<?php

namespace Database\Seeders;

use App\Models\AppHelper;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Salma Akter', 
            'email' => 'salma@gmail.com',
            'password' => bcrypt('123456'),
            'code' => AppHelper::createRandomCode()
        ]);
    
        $role = Role::create(['name' => 'Super Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        
    }
}
