<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->createOne([
            'username' => 'tecnologia@participacionbogota.gov.co',
            'password' => Hash::make('secret'),
        ]);

        \App\Models\User::factory()->createOne([
            'username' => 'jgrajales@participacionbogota.gov.co',
            'password' => Hash::make('secret2'),
        ]);

        \App\Models\User::factory()->createOne([
            'username' => 'ingandresgrajales@gmail.com',
            'password' => Hash::make('secret3'),
        ]);

        \App\Models\Company::factory(10)->create();
        \App\Models\Employee::factory(50)->create();
    }
}
