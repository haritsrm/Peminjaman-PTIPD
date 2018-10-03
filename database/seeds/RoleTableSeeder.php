<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Super Administration',
                'description' => 'Only one and only super admin',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Access for registed admin',
            ],
            [
                'name' => 'user',
                'display_name' => 'Registed User',
                'description' => 'Access for registed user',
            ],
            [
                'name' => 'suspend',
                'display_name' => 'Suspended Account',
                'description' => 'Account was Suspended',
            ]
        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
        //add user
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'admin1@local.local', 
                'alamat' => 'Cibiru, Bandung',
                'no_tlp' => '087777777777',
                'instansi' => 'UIN Sunan Gunung Djati',
                'jabatan' => 'Admin',
                'password' => bcrypt('adminadmin'),
            ]
        ];
        $n=1;
        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }
    }
}
