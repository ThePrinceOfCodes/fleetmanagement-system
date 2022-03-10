<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::updateOrCreate(['id'=>1],
        [
            'name'=> 'ANCAPS GLOBAL',
            'email'=>'princejason109@gmail.com',
            'password'=>'$2y$10$M9LdPPpYvcC52V1cvdE33.H23h0YKlmplNNggXX2Ac6DX1PnQIYJW'
        ]);
    }
}
