<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = array();

        $users = [
            ['name' => 'Administrador', 'email' => 'administrador@email.com', 'password' => Hash::make('administrador')],
            ['name' => 'Usuario', 'email' => 'usuario@email.com', 'password' => Hash::make('usuario')]
        ];

        DB::table('users')->insert($users);
    }
}
