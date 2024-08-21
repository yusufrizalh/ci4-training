<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $usermodel = new UserModel();
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 11; $i++) {
            $usermodel->save([
                'username' => $faker->name,
                'usermail' => $faker->email,
                'userpass' => $faker->password,
                'status' => $faker->numberBetween(0, 1),
                'fk_dept_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
