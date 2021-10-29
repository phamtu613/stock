<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('recomments')->insert(
			[
				'date_recomment' => '2021-03-7',
				'content_recomment' => '7',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		);
		// DB::table('admins')->insert([
		//     'name' => 'Hai Le Canslim',
		//     'email' => 'lqhai195@gmail.com',
		//     'password' => bcrypt('123456'),
		//     'phone' => ' 0905915183',
		//     'address' => 'Da Nang',
		//     'avatar' => 'https://zpsocial-f43-org.zadn.vn/db093e5f2cb2c1ec98a3.jpg',
		//     'position' => 'trainer',
		//     'desc' => 'Mô tả trainer',
		//     'facebook' => 'fb.com',
		//     'zalo' => 'zalo.com',
		//     'created_at' => Carbon::now(),
		//     'updated_at' => Carbon::now()
		// ]);
	}
}
