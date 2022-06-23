<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $roles = array(
            array('id' => 1,'name' => "Loss fo Pay leave",'slug' => Str::slug('Loss fo Pay leave')),
            array('id' => 2,'name' => "Bereavement Leave",'slug' => Str::slug('Bereavement Leave')),
            array('id' => 3,'name' => "Sick Leave",'slug' => Str::slug('Sick Leave')),
            array('id' => 4,'name' => "Annual Leave",'slug' => Str::slug('Annual Leave')),
            array('id' => 5,'name' => "Casual Leave",'slug' => Str::slug('Casual Leave')),
            array('id' => 6,'name' => "Paternity Leave",'slug' => Str::slug('Paternity Leave')),
            array('id' => 7,'name' => "Compensatory Leave",'slug' => Str::slug('Compensatory Leave')),
            array('id' => 8,'name' => "Marraige Leave",'slug' => Str::slug('Marraige Leave')),
            array('id' => 9,'name' => "Maternity Leave",'slug' => Str::slug('Maternity Leave')),
        );
        DB::table('leaves')->insert($roles);
    }
}
