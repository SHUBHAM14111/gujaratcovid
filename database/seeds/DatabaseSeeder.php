<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@test.com',
        //     'password' => Hash::make('admin'),
        // ]);
        $this->call([DistrictSeeder::class]);
        $this->call([AdminSeeder::class]);

    }
}
