<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Montadoras;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Insertindo dados do app contados");
        DB::table('app_contatos')->insert([
            ['nome' => 'Whatsapp','link' => '..','img'   =>  '..'],
            ['nome' => 'Telegran','link' => '..','img'   =>  '..'],
            ['nome' => 'Não possui App','link' => '..','img'   =>  '..']
        ]);
        $this->command->info("Insertindo dados clientes");
        Cliente::factory(20)->has(Contato::factory(20)->count(2))
        ->create();
        $this->command->info("Insertindo dados do montadoras");
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

        $this->command->info("Insertindo dados Tipos Pagamentos");
        DB::table('tipos_pagamentos')->insert([
            ["nome"=>"InfinityPay",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"SumUp",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Dinheiro Especie",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Pix",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

        ]);
        DB::table('formas_pagamentos')->insert([
            ["nome"=>"Débito",'taxa'=>1,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X1",'taxa'=>1,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X2",'taxa'=>2,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X3",'taxa'=>3,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X4",'taxa'=>4,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X5",'taxa'=>5,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X6",'taxa'=>6,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X7",'taxa'=>7,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X8",'taxa'=>8,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X9",'taxa'=>9,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X10",'taxa'=>10,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X11",'taxa'=>11,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X12",'taxa'=>12,'tipo_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

            ["nome"=>"Débito",'taxa'=>1,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X1",'taxa'=>1,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X2",'taxa'=>2,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X3",'taxa'=>3,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X4",'taxa'=>4,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X5",'taxa'=>5,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X6",'taxa'=>6,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X7",'taxa'=>7,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X8",'taxa'=>8,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X9",'taxa'=>9,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X10",'taxa'=>10,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X11",'taxa'=>11,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Crédito X12",'taxa'=>12,'tipo_id'=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

            ["nome"=>"A vista",'taxa'=>0,'tipo_id'=>3,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

            ["nome"=>"CNPJ ",'taxa'=>0,'tipo_id'=>4,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"CPF ",'taxa'=>0,'tipo_id'=>4,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

        ]);

        $this->command->info("Insertindo dados status");
        DB::table('status')->insert([
            ["nome"=>"Orçamento","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>false,"habilitar_funcoes"=>true],
            ["nome"=>"Aprovado","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>true,"habilitar_funcoes"=>true],
            ["nome"=>"Recusado","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>false,"habilitar_funcoes"=>false],
            ["nome"=>"Retorno","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>true,"habilitar_funcoes"=>true],
            ["nome"=>"Concluido","cor_fundo"=>"..","cor_letra"=>"..","cobrar"=>false,"habilitar_funcoes"=>false],
        ]);
        $this->command->info("Insertindo dados relacionamento status");
        DB::table('status_status')->insert([
            ['status_atual_id'=>1,'status_proximo_id'=>2] ,
            ['status_atual_id'=>1,'status_proximo_id'=>2] ,
            ['status_atual_id'=>2,'status_proximo_id'=>3] ,
            ['status_atual_id'=>2,'status_proximo_id'=>4] ,
            ['status_atual_id'=>2,'status_proximo_id'=>5] ,
        ]);
        $this->command->info("Insertindo dados modelos");
        DB::table('modelos')->insert([
            ["nome"=>"Gol","montadora_id"=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Celta","montadora_id"=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Classic","montadora_id"=>2,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Ecosport","montadora_id"=>3,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"TR4","montadora_id"=>4,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Palio","montadora_id"=>5,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
        $this->command->info("Insertindo dados do veiculos");
        DB::table('veiculos')->insert([
            ["placa"=>"HUI3024","modelo_id"=>1,"ano"=>1994,"cor"=>"branco",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["placa"=>"PCN8322","modelo_id"=>2,"ano"=>1994,"cor"=>"branco",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["placa"=>"OCC1212","modelo_id"=>3,"ano"=>1994,"cor"=>"branco",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["placa"=>"OICOA40","modelo_id"=>4,"ano"=>1994,"cor"=>"branco",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["placa"=>"POP1221","modelo_id"=>5,"ano"=>1994,"cor"=>"branco",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

        ]);

        $this->command->info("Insertindo dados do contratos");
        DB::table("contratos")->insert([
            ['cliente_id'=>10,"veiculo_id"=>1,"defeito"=>"teste","solucao"=>"teste","garantia"=>Carbon::now(),'token'=>Str::random(60)] ,

        ]);
        $this->command->info("Insertindo dados do historicos");
        DB::table("historicos")->insert([
            ['contrato_id'=>1,"status_id"=>1,"data"=>Carbon::now(),"obs"=>"teste"] ,

        ]);
        $this->command->info("Insertindo dados de servicos");
        DB::table("servicos")->insert([
            ['nome'=>"servico teste 01","valor"=>10] ,
            ['nome'=>"servico teste 02","valor"=>100] ,
            ['nome'=>"servico teste 03","valor"=>110] ,

        ]);
        $this->command->info("Insertindo dados de servicos historico");
        DB::table("historico_servico")->insert([
            ['historico_id'=>1,"servico_id"=>1,"valor"=>10,"data"=>Carbon::now(),"cobrar"=>false] ,
            ['historico_id'=>1,"servico_id"=>2,"valor"=>1000,"data"=>Carbon::now(),"cobrar"=>false] ,
            ['historico_id'=>1,"servico_id"=>3,"valor"=>100,"data"=>Carbon::now(),"cobrar"=>false] ,
        ]);

        $this->command->info("Insertindo dados peças avulsas");
        DB::table('pecas_avulsas')->insert([
            ["nome"=>"Sensor de velocidade ","valor"=>"78",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Painel de instrumentos Palio","valor"=>"77",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Sensor de velocidade Onix","valor"=>"55",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"pião","valor"=>"73",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Sensor de nível","valor"=>"40",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Display  ","valor"=>"500",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["nome"=>"Filtro de combustivel","valor"=>"50",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

        ]);
        $this->command->info("Insertindo dados peças avulsas em historicos");
        DB::table('historico_peca')->insert([
            ["historico_id"=>"1","peca_id"=>"1","valor"=>"50",'cobrar'=>0,'marca'=>'original','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["historico_id"=>"1","peca_id"=>"2","valor"=>"250",'cobrar'=>0,'marca'=>'original','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["historico_id"=>"1","peca_id"=>"3","valor"=>"500",'cobrar'=>0,'marca'=>'original','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["historico_id"=>"1","peca_id"=>"4","valor"=>"60",'cobrar'=>0,'marca'=>'original','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ["historico_id"=>"1","peca_id"=>"5","valor"=>"77",'cobrar'=>1,'marca'=>'original','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

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
            'forma_pagamento_preferido'=>'28'
        ]);

        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
