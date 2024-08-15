<?php

namespace App\Database\Seeds;

use App\Models\UserskillsModel;
use CodeIgniter\Database\Seeder;

class UserskillsSeeder extends Seeder
{
    public function run()
    {
        $usermodel = new UserskillsModel();
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 351; $i++) {
            $usermodel->save([
                'fk_user_id' => $faker->numberBetween(1, 100),
                'fk_skill_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
