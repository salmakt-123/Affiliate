<?php

namespace Database\Seeders;

use App\Models\AppHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GeneralUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'General user', 
            'email' => 'general@gmail.com',
            'password' => bcrypt('123456'),
            'code' => AppHelper::createRandomCode()
        ]);
    
        $role = Role::create(['name' => 'General User']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
