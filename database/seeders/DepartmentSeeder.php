<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->delete();
        $departements = array(
            array('id' => 1,'name' => "Marketing & Proposals Department"),
            array('id' => 2,'name' => "Sales Department"),
            array('id' => 3,'name' => "Project Department"),
            array('id' => 4,'name' => "Designing Department"),
            array('id' => 5,'name' => "Production Department"),
            array('id' => 6,'name' => "Maintenance Department"),
            array('id' => 7,'name' => "Store Department"),
            array('id' => 8,'name' => "Quality Department"),
            array('id' => 9,'name' => "Inspection Department"),
            array('id' => 10,'name' => "Packaging Department"),
            array('id' => 11,'name' => "Finance Department"),
            array('id' => 12,'name' => "Dispatch Department"),
            array('id' => 13,'name' => "Account Department"),
            array('id' => 14,'name' => "Research & Development  Department"),
            array('id' => 15,'name' => "Information Technology Department"),
            array('id' => 16,'name' => "Human Resource Department"),
            array('id' => 17,'name' => "Security Department"),
            array('id' => 18,'name' => "Administration Department"),
        );
        DB::table('departments')->insert($departements);
    }
}
