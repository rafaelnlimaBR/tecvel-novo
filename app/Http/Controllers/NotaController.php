<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Historico;
use App\Models\ImagensNota;
use App\Models\Nota;
use App\Models\Whatsapp;
use \Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Support\Str;
use Mockery\Matcher\Not;


class NotaController extends Controller
{
    public function novo($id,$historico_id)
    {
        try{
            $contrato   =   Contrato::find($id);
            $dados = [
                'titulo'        => "Nova Nota",
                'contrato'      =>   $contrato,
                'historico_id'   => $historico_id
            ];
            if($contrato==null){
                return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Contrato não existe']);
            }
            return view('admin.contratos.includes.nota',$dados);


        }catch (\Exception $e){
            return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function editar($id,$historico_id,$nota_id)
    {
        try{
            $contrato   =   Contrato::find($id);
            $nota       =   Nota::find($nota_id);
            $dados = [
                'titulo'        => "Nova Nota",
                'contrato'      =>   $contrato,
                'nota'          =>  $nota
            ];
            if($contrato==null or $nota ==null){
                return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Contrato ou nota não existem']);
            }
            return view('admin.contratos.includes.nota',$dados);


        }catch (\Exception $e){
            return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function cadastrar(Request $r)
    {
        try{


            $nota                   =   new Nota();
            $nota->texto            =   $r->get('texto');
            $nota->historico_id     =   $r->get('historico');
            $nota->tipo_nota_id          =   $r->get('tipo_nota');

            if($nota->save()){
                $contrato       =   $nota->historico->contrato;
                return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Nota Atualizada com sucesso"]);
            }



        }catch (\Exception $e){
            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function atualizar(Request $r)
    {
        try{
            $nota                   =   Nota::find($r->get('id'));
            if($nota == null){
                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>"Nenhuma nota foi encontrada"]);
            }
            $nota->texto            =   $r->get('texto');
            $nota->historico_id     =   $r->get('historico');
            $nota->tipo_nota_id     =   $r->get('tipo_nota');
            $contrato       =   $nota->historico->contrato;
            if($nota->save()){
                return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Nota Atualizada com sucesso"]);
            }


        }catch (\Exception $e){
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function excluir($id)
    {
        try{
            $nota           =   Nota::findOrFail($id);
            $contrato       =   $nota->historico->contrato;
            foreach ($nota->imagens as $imagem){
                if(\File::exists(public_path('/images/notas/').$imagem->nome)){
                    \File::delete(public_path('/images/notas/').$imagem->nome);
                }
            }

            if($nota->delete()){

                return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Nota exluido com sucesso"]);
            }

        }catch (\Exception $e){
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function adicionarImagens(Request $r)
    {


        try{


            if(!$r->hasFile('imagens')){
                return "nao tem imagem";
            }
            $nota       =   Nota::find($r->get('id'));
            $contrato   =   $nota->historico->contrato;

            foreach($r->file('imagens') as $i=> $image){
                if (!file_exists(public_path('/images/notas/'))){
                    mkdir(public_path('/images/notas/'), 0777, true);
                }
                $filename="";
                $filename = $r->get('id').'-'.Str::random(16).'.'.$image->getClientOriginalExtension();

                $resize  =  Image::read($image)->resize($nota->tipo->width_imagem,$nota->tipo->height_imagem);
                $resize->save(public_path('/images/notas/').$filename);
                $img                =   new ImagensNota();
                $img->nota_id       =   $nota->id;
                $img->nome          =   $filename;
                ($i ==0 )?$img->texto=$r->get('descricao'):$img->texto='';
                $img->save();

            }
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Imagem registrada com sucesso"]);

        }catch (\Exception $e){
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function atualizarImagens(Request $r)
    {

        try{
            $img        =   ImagensNota::find($r->get('id'));
            $nota       =   $img->nota;
            $contrato   =   $img->nota->historico->contrato;

            $img->texto =   $r->get('texto');

            if($img->save()){
                return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Imagem atualizada com sucesso"]);
            }

        }catch (\Exception $e){
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function excluirImagens($id)
    {
        try{
            $imagem             =   ImagensNota::findOrFail($id);
            $nota               =   $imagem->nota;
            $contrato           = $imagem->nota->historico->contrato;

            if(\File::exists(public_path('/images/notas/').$imagem->nome)){
                \File::delete(public_path('/images/notas/').$imagem->nome);
            }
            $imagem->delete();
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Imagem excluida com sucesso"]);

        }catch (\Exception $e) {
            return redirect()->route('contrato.editar.nota', ['id' => $contrato->id, 'historico_id' => $contrato->historicos->last()->id, 'nota_id' => $nota->id, 'pagina' => 'notas'])->with('alerta', ['tipo' => 'danger', 'icon' => '', 'texto' => $e->getMessage()]);
        }
    }

    public function enviarImagensAplicativos($id, $historico_id,$nota_id)
    {
        try{
            $historico              =   Historico::find($historico_id);
            if($historico == null   ){
                return "nao existe historico";
            }
            $contrato   =   $historico->contrato;
            $nota                   =   Nota::find($nota_id);
            if($nota == null   ){
                return "nao existe nota";
            }
            $whatsapp   =   new Whatsapp();
            $caminho    =   'images/notas/';

                $resultado  =   [];
                $count  =   1;
                foreach ($historico->contrato->cliente->contatos as $key => $contato){

                    foreach ($nota->imagens as $k   => $imagen){
                        $url    =   URL::to($caminho.$imagen->nome);
                        $resultado   =   array_merge($resultado,[$whatsapp->enivarMensagemMedia($url,$contato->numero,$imagen->texto,$imagen->nome,2,55,"image")]);


                        $count++;
                    }


                }



            return redirect()->route('contrato.editar',['id'=>$historico->contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'notas'])->with('alertas',$resultado);



        }catch (\Exception $e){
            return redirect()->route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$historico->id,'nota_id'=>$nota->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }
}
