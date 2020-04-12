<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('expenses')->insert([
                'title' => $faker->title(),
                'description' => $faker->name(),
                'amount' => $faker->numberBetween(1000, 5000),
                'start_date' => $faker->date('Y-m-d', 'now'),
                'end_date' => $faker->date('Y-m-d', 'now'),
                'user_id' => $faker->numberBetween(1, 9),
                'currency_id' => $faker->numberBetween(1, 2),
                'category_id' => $faker->numberBetween(1, 2)
            ]);
        }
    }
}
