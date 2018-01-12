<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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
		Role::truncate();
		User::truncate();

		$adminRole = Role::create(['name' => 'Admin']);
		$writterRole = Role::create(['name' => 'Writter']);

		$admin = new User();
		$admin->name = "Cristian";
		$admin->email = "cristian.galeano1913@gmail.com";
		$admin->password = bcrypt("123456");
		$admin->save();

		$admin->assignRole($adminRole);

		$writer = new User();
		$writer->name = "Cristian Galeano";
		$writer->email = "cristianlistasseguras@gmail.com";
		$writer->password = bcrypt("123456");
		$writer->save();

		$writer->assignRole($writterRole);

	}
}
