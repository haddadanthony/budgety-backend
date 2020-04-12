<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('CurrenciesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('IncomesTableSeeder');
        $this->call('ExpensesTableSeeder');
    }
}
