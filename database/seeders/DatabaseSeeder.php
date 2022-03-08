<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Advertisement;
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
        
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CityTableSeeder::class);
       
        $this->call(LeaveSeeder::class);
        User::factory(25)->create();
    }
}
