<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Contato;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


         DB::table('app_contatos')->insert([
            ['nome' => 'Whatsapp','link' => '..','img'   =>  '..'],
            ['nome' => 'Telegran','link' => '..','img'   =>  '..'],
            ['nome' => 'Não possui App','link' => '..','img'   =>  '..']
        ]);



        Cliente::factory(100)->has(Contato::factory(100)->count(2))
        ->create();

        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
