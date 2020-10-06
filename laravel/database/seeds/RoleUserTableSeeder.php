<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		\App\User::create([
	        'pn'       => '11111111',
	        'name'     => 'Super Admin',
	        'email'    => 'superadmin@mail.com',
	        'password' => bcrypt('superadmin'),
	        'role_id'  => 1,
	        'actived'  => 1,
		]);

		\App\User::create([
	        'name'     => 'Administator',
	        'email'    => 'admin@mail.com',
	        'password' => bcrypt('adminadmin'),
	        'nohp'     => '09089789988',
	        'role_id'  => 2, 
	        'actived'  => 1, 
		]);

		\App\User::create([
	        'pn'       => '22222222',
	        'name'     => 'Member',
	        'email'    => 'member@mail.com',
	        'bagian'   => 'TSI',
	        'password' => bcrypt('membermember'),
	        'role_id'  => 3,
	        'actived'  => 1,
		]);

		\App\Role::create([
	        'nama'     => 'Super Admin',
		]);

		\App\Role::create([
	        'nama'     => 'Admin',
		]);

		\App\Role::create([
	        'nama'     => 'Member',
		]);
		
    }
}
