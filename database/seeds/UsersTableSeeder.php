<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Permission::truncate();
		Role::truncate();
		User::truncate();

		$adminRole = Role::create(['name' => 'Admin']);
		$writterRole = Role::create(['name' => 'Writter']);

		$viewPostsPermission   = Permission::create(['name' => 'View posts']);
		$createPostsPermission = Permission::create(['name' => 'Create posts']);
		$updatePostsPermission = Permission::create(['name' => 'Update posts']);
		$deletePostsPermission = Permission::create(['name' => 'Delete posts']);

		$admin           = new User();
		$admin->name     = "Cristian";
		$admin->email    = "cristian.galeano1913@gmail.com";
		$admin->password = "123456";
		$admin->save();

		$admin->assignRole($adminRole);

		$writer           = new User();
		$writer->name     = "Cristian Galeano";
		$writer->email    = "cristianlistasseguras@gmail.com";
		$writer->password = "123456";
		$writer->save();

		$writer->assignRole($writterRole);

	}
}
