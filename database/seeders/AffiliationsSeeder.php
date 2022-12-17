<?php

namespace Database\Seeders;

use App\Models\AppHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AffiliationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for affiliate user
        $user = User::create([
            'name' => 'Rinky', 
            'email' => 'rinky@gmail.com',
            'password' => bcrypt('123456'),
            'code' => AppHelper::createRandomCode()
        ]);
    
        $role = Role::create(['name' => 'Affiliations']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
