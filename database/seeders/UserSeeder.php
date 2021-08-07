<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'nom'=>'Admin',
                'prenom'=>'Administrateur',
                'phone'=>'622 22 22 22',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('12345678'),
                'adresse'=>'Kipe'
            ],
            [
                'nom'=>'Gerant',
                'prenom'=>'Gerant',
                'phone'=>'622 22 22 22',
                'email'=>'gerant@gmail.com',
                'password'=>bcrypt('12345678'),
                'adresse'=>'Kipe'
            ]

        ];

        foreach ($user as $key => $value) {
        	User::create($value);
        }
    }
}
