<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Provider\en_US\Address;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('currencies')->insert([
                'name' => $faker->currencyCode(),
                'country' => $faker->country(),
                'symbol' => $faker->currencyCode(),
                'code' => $faker->numberBetween(10, 100)
            ]);
        }
    }
}
