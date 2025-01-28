<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
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
        $this->command->info("Insertindo dados do app contados");
        DB::table('app_contatos')->insert([
            ['nome' => 'Whatsapp','link' => '..','img'   =>  '..'],
            ['nome' => 'Telegran','link' => '..','img'   =>  '..'],
            ['nome' => 'Não possui App','link' => '..','img'   =>  '..']
        ]);
        $this->command->info("Insertindo dados clientes");
        Cliente::factory(20)->has(Contato::factory(100)->count(2))
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
            ['cliente_id'=>10,"veiculo_id"=>1,"defeito"=>"teste","obs"=>"teste","solucao"=>"teste","garantia"=>Carbon::now()] ,

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

        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
