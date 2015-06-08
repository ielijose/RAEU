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



	}

}