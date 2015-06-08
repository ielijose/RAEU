<?php

class UserTableSeeder extends Seeder {

	public function run()
	{

		User::create(array(
			'full_name' => 'Eli José Carrasquero',
			'phone' => '+58 424 602 9989',
			'ci' => '21382657',
			'email' => 'user@gmail.com',
			'password' => \Hash::make('2512'),
			'type' => 'user'
			));

		User::create(array(
			'full_name' => 'José Angel',
			'phone' => '+58 424 602 9989',
			'ci' => '21382657',
			'email' => 'josah1981@gmail.com',
			'password' => \Hash::make('1981'),
			'type' => 'user'
			));

		User::create(array(
			'full_name' => 'Oscar',
			'phone' => '+58 424 602 9989',
			'ci' => '21382657',
			'email' => 'oscar@gmail.com',
			'password' => \Hash::make('1234'),
			'type' => 'user'
			));

	}

}