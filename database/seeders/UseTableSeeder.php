<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'nome' => 'Ales Nascimento',
            'email' => 'alept40@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
