<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_it =  Role::firstOrCreate(
            ['id' => Role::SUPER_ADMIN],
            ['role_name' => 'مدير النظام', 'name' => 'super_admin']
        );

        Artisan::call('permission:create-permission-routes');

        $permissions = Permission::pluck('id', 'id')->all();

        $role_it->syncPermissions($permissions);

        $user = User::create(
            [
                'name' => 'لين يحيى الشرفي',
                'email' => 'leenalsharafi0@gmail.com',
                'username' => 'leenalsharafi0',
                'phone_number' => '0506415175',
                'national_id' => '123',
                'password' => Hash::make('leenalsharafi0$312%578'),
            ],
        );

        $user->assignRole([$role_it->id]);

        $user = User::create(
            [
                
                'name' => 'رغد فهدالمغيدي',
                'email' => 'ralmagadi@kku.edu.sa',
                'username' => 'ralmagadi',
                'password' => Hash::make('ralmagadi$312%578'),
                'phone_number' => '0545001845',
                'mobile_number' => '0545001845',

            ],
        );

        $user->assignRole([$role_it->id]);

        $user = User::create(
            [
                'name' => 'مها ناصر',
                'email' => 'manaasiri@kku.edu.sa',
                'username' => 'manaasiri',
                'password' => Hash::make('manaasiri$312%578'),
                'phone_number' => '054215543',
                'mobile_number' => '054215543',

            ],
        );


        $user->assignRole([$role_it->id]);
    }
}
