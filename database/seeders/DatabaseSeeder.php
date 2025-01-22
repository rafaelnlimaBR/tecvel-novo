<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Montadoras;
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

         DB::table('status')->insert([
             ["nome"=>"Orçamento","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>false,"habilitar_funcoes"=>true],
             ["nome"=>"Aprovado","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>true,"habilitar_funcoes"=>true],
             ["nome"=>"Recusado","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>false,"habilitar_funcoes"=>false],
             ["nome"=>"Retorno","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>true,"habilitar_funcoes"=>true],
             ["nome"=>"Concluido","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>false,"habilitar_funcoes"=>false],
         ]);
         DB::table('status_status')->insert([
            ['status_atual_id'=>1,'status_proximo_id'=>2] ,
            ['status_atual_id'=>1,'status_proximo_id'=>2] ,
            ['status_atual_id'=>2,'status_proximo_id'=>3] ,
            ['status_atual_id'=>2,'status_proximo_id'=>4] ,
            ['status_atual_id'=>2,'status_proximo_id'=>5] ,
         ]);

         DB::table('configuracao')->insert([
            'nome_principal'        =>  "Tecvel",
             'nome_segundario'      =>  "Eletrônica Automotiva",
             'descricao'            =>  "especialicada em conserto de painel de instrumentos",
             'meta'                 =>  "painel de instrumentos",
             'logo'                 =>  'logo.png',
             'instagran'            =>  'tecvel',
             'whatsapp'             =>  "85987067785",
             'endereco'             =>  "Rua Pinto Madeira, 750",
             'cidade'               =>  "Fortaleza",
             'uf'                   =>  "CE",
             'bairro'               =>  "Centro",
             'cep'                  =>  "60150-000",
             'abertura'             =>  DB::table('status')->where('nome','like','Orçamento')->first()->id,
             'aprovado'             =>  DB::table('status')->where('nome','like','Aprovado')->first()->id,
             'recusado'             =>  DB::table('status')->where('nome','like','Recusado')->first()->id,
             'retorno'              =>  DB::table('status')->where('nome','like','Retorno')->first()->id,
             'concluido'            =>  DB::table('status')->where('nome','like','Concluido')->first()->id,
         ]);



        Cliente::factory(20)->has(Contato::factory(100)->count(2))
        ->create();

        DB::table('montadoras')->insert([
            ['nome'          =>  "Fiat"],
            ['nome'          =>  "Volkswagem"],
            ['nome'          =>  "Chevrolet"],
            ['nome'          =>  "Renault"],
            ['nome'          =>  "Ford"],
            ['nome'          =>  "Jeep"],
            ['nome'          =>  "Mitsubishi"],
            ['nome'          =>  "Honda"],
            ['nome'          =>  "Toyota"],
            ['nome'          =>  "BYD"],
            ['nome'          =>  "Suzuki"],
            ['nome'          =>  "Hyundai"],
        ]);

        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
