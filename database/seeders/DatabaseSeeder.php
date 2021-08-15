<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$admin = new User();
		$admin->login = "Administrator";
		$admin->email = "admin@freeads.fr";
		$admin->password = "password!";
		$admin->nickname = "Admin";
		$admin->phoneNumber = "911";
		$admin->is_admin = true;
		$admin->save();

		$client = new User();
		$client->login = "Client";
		$client->email = "client@freeads.fr";
		$client->password = "password!";
		$client->nickname = "Johnny";
		$client->phoneNumber = "118218";
		$client->save();

		$user1 = User::factory()->create([
			'login' 		=> 'Jean-jackson',
			'email' 	=> 'jean-jackson.medilien@epitech.eu'
		]);

		$user2 = User::factory()->create([
			'login' 		=> 'Mathieu',
			'email' 	=> 'mathieu.carriere@epitech.eu'
		]);

		$user3 = User::factory()->create([
			'login' 		=> 'Antonin',
			'email'		=> 'antonin.prion@epitech.eu',
		]);

		$cat1 = Category::factory()->create([
			'name'	=>	'Electroménager',
		]);

		$cat2 = Category::factory()->create([
			'name'	=>	'Meuble',
		]);

		$cat3 = Category::factory()->create([
			'name'	=>	'Multimédia',
		]);

		$users = [$admin, $client, $user1, $user2, $user3];
		$categories = [$cat1, $cat2, $cat3];

		//Creaetes 6 ads in one loop
		for ($i = 0; $i < 10; $i++) {
			shuffle($users);
			shuffle($categories);

			Ad::factory()->create([
				'user_id' 		=> $users[0]->id,
				'category_id' 	=> $categories[0]->id,
			]);

			Ad::factory()->create();

			Ad::factory()->create([
				'user_id' 		=> $users[0]->id,
			]);

			Ad::factory()->create();

			Ad::factory()->create([
				'category_id' 	=> $categories[0]->id,
			]);

			Ad::factory()->create();
		}

		$ads = Ad::all();
		foreach($ads as $ad) {
			Image::factory()->create([
				'ad_id' => $ad->id,
			]);
		}

    }
}
