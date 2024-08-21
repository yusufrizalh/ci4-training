<?php

namespace App\Database\Seeds;

use App\Models\UserskillsModel;
use CodeIgniter\Database\Seeder;

class UserskillsSeeder extends Seeder
{
    public function run()
    {
        $userskilsmodel = new UserskillsModel();
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 31; $i++) {
            $userskilsmodel->save([
                'fk_user_id' => $faker->numberBetween(1, 10),
                'fk_skill_id' => $faker->numberBetween(1, 6),
            ]);
        }
    }
}
