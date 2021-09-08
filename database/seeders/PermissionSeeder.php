<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([
            ["nom"=> "ajouter un user"],
            ["nom"=> "consulter un user"],
            ["nom"=> "editer un user"],
            ["nom"=> "delete un user"],

            ["nom"=> "ajouter un cours"],
            ["nom"=> "consulter un cours"],
            ["nom"=> "editer un cours"],
            ["nom"=> "delete un cours"],

        ]);
    }
}
