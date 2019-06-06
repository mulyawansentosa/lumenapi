<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Company::class, 50)->create()->each(function ($company) {
            $company->customers()->save(factory(App\Customers::class)->make());
        });
        factory(App\Customer::class, 50)->create();
        factory(App\User::class, 50)->create();
    }
}
