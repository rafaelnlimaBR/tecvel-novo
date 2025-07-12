<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Comentario;
use App\Models\Configuracao;
use App\Models\Contato;
use App\Models\Contrato;
use App\Models\ImagensNota;
use App\Models\Montadora;
use App\Models\Nota;
use App\Models\Postagem;
use App\Models\Status;
use App\Models\Token;
use App\Models\Veiculo;
use App\Models\Whatsapp;
use Carbon\Carbon;
use FontLib\Table\Type\post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    private $conf;
    private $dados;

    public function __construct()
    {
        $this->conf     =   Configuracao::find(1);
        $this->dados    =   [
            'nome_principal'    =>  $this->conf->nome_principal,
            'endereco' =>  $this->conf->endereco,
            'bairro'   =>  $this->conf->bairro,
            'cidade'   =>  $this->conf->cidade,
            'estado'    =>  $this->conf->uf,
            'cep'    =>  $this->conf->cep,
            'telefone'    => $this->conf->whatsapp,
            'email'    =>  $this->conf->email,
            'instagram'      => $this->conf->instagran,
            'categorias_menu'   => Categoria::all()

        ];
    }

    public function categoria( $categoria_id)
    {
        try {
            $categoria  =   Categoria::where('id',$categoria_id)->firstOrFail();
            $this->dados    +=  [
                'postagens'     => $categoria->postagens()->paginate(3),
                'titulo'        => $categoria->nome
            ];

            return \view('front.categoria',$this->dados);
        }catch (ModelNotFoundException   $e){

            return \view('front.error.pagina-nao-encontrada',$this->dados);
        }

    }

    public function modelos($id)
    {
        $montadora      =   Montadora::find($id);
        $modelos        =   $montadora->modelos;
        return response()->json($modelos->map->only(['id','nome']));
    }
    public function sobre()
    {
        return \view('front.sobre',$this->dados);
    }

    public function home()
    {

        $this->dados    +=   [
            'banners'       =>  Carousel::where('ativo',true)->orderBy('sequencia','desc')->get(),
            'categorias'    =>  Categoria::all()
        ];


        return \view('front.home',$this->dados);
    }

    public function contato()
    {

        return \view('front.contato')->with($this->dados);
    }
    public function teste($telefone,$mensagem){


        $whatsapp       =   new Whatsapp();
        $whatsapp->enviarMensagem($mensagem,$telefone);
    }

    public function postagem($post,Request $request)
    {
        try{


            $post = Postagem::where('link',$post)->firstOrFail();
            $post->adicionarVisita();
            $this->dados    +=[
                'titulo' => $post->titulo,
                'postagem' => $post,
            ];
            return \view('front.postagem',$this->dados);
        }catch (ModelNotFoundException $th){
            return \view('front.error.pagina-nao-encontrada',$this->dados);
        }
//

    }


    public function orcamento()
    {
        $this->dados    +=   [
            'titulo' => 'Fazer Orçamento ',
            'descricao' => 'Faça um orçamento rápido, fácil e gratis através desse link.',
            'imagem'    =>   'https://novo.tecvelautomotiva.com.br/public/images/logo.png'
        ];

        return \view('front.orcamento03',$this->dados);

    }

    public function cadastrarPedidoOrcamento(Request $request)
    {
        try{

            $validator = Validator::make($request->all(),[
                'nome'          =>  'required',
                'email'         =>  'required',
                'whatsapp'      =>  'required',
                'placa'        =>  'required',
                'marca'        =>  'required',
                'modelo'        =>  'required',
                'ano'          =>  'required',
                'cor'          =>  'required',
               'descricao'     =>  'required',
                'imagens[]'       =>  'mimes:jpeg,png,jpg',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $telefone                   =   str_replace(['(',')'],'',$request->input('whatsapp'));
            $cliente                    =   Cliente::where(['email'=>$request->input('email'),]);
            if(!$cliente->exists()){
                $cliente                    =   new Cliente();
                $cliente          =   $cliente->gravar(
                    $request->input('nome'),
                    $request->input('email'),
                    $request->input('cep'),
                    $request->input('endereco'),
                    $request->input('numero'),
                    $request->input('bairro'),
                    $request->input('cidade'),
                    $request->input('estado'),
                );
                if($cliente == null){
                    return redirect()->route('site.orcamento')->with(['alerta'=>['tipo'=>'danger','texto_principal'=>'Erro ao cadastrar Cliente!','texto_segundario'=>'entrar em contato com o representante da empresa. Obrigado'],'formulario_off'=>true]);
                }
            }else{
                $cliente=$cliente->first();
            }

            $contato            =   Contato::where('numero',$telefone);
            if(!$contato->exists()){
                $contato = ContatoController::cadastrar($telefone,Configuracao::first()->whatsapp_id);
            }else{
                $contato=$contato->first();
            }

            if(!$cliente->contatos()->where('numero',$telefone)->exists()){
                $cliente->contatos()->save($contato);
            }



            $veiculo                    =   Veiculo::where(['placa'=>$request->get('placa')]);
            if(!$veiculo->exists()){
                $veiculo                    =   new Veiculo();
                $veiculo->placa             =   $request->input('placa');
                $veiculo->modelo_id         =   $request->input('modelo');
                $veiculo->cor               =   $request->input('cor');
                $veiculo->ano               =   $request->input('ano');
                $veiculo->save();
            }else{
                $veiculo=$veiculo->first();
            }




            $contrato                       =   new Contrato();
            $contrato->cliente_id           =   $cliente->id;
            $contrato->veiculo_id           =   $veiculo->id;
            $contrato->defeito              =   "";
            $contrato->solucao              =   "";
            $contrato->pedido_orcamento         =   true;
            $contrato->visualizado              =   false;


            if($contrato->save()) {
                $status = Status::find(Configuracao::first()->abertura);
                $contrato->status()->attach($status, ['obs' => 'Criado através de link para solicitação de orçamento', 'data' => Carbon::now()->format('Y-m-d')]);
                $nota                   =   new Nota();
                $nota->texto            =   $request->input('descricao');
                $nota->historico_id     =   $contrato->historicos->last()->id;
                $nota->tipo_nota_id          =   Configuracao::first()->solicitação_orcamento;
                $nota->save();

                if($request->hasFile('imagens')){



                $contrato   =   $nota->historico->contrato;

                    foreach($request->file('imagens') as $i=> $image){
                        if (!file_exists(public_path('/images/notas/'))){
                            mkdir(public_path('/images/notas/'), 0777, true);
                        }
                        $filename="";
                        $filename = $request->get('id').'-'.Str::random(16).'.'.$image->getClientOriginalExtension();

                        $resize  =  Image::read($image)->resize($nota->tipo->width_imagem,$nota->tipo->height_imagem);
                        $resize->save(public_path('/images/notas/').$filename);
                        $img                =   new ImagensNota();
                        $img->nota_id       =   $nota->id;
                        $img->nome          =   $filename;
                        $img->save();

                    }
                }

                Mail::to($this->conf->email,$this->conf->nome_principal)->send(new \App\Mail\NovoOrcamentoMail($contrato));
//                Mail::send(new \App\Mail\NovoOrcamentoMail($contrato));
            }

            $zap    =   new Whatsapp();
            $zap->enviarMensagem('Solicitação de orçamento criado com sucesso. Em breve você receberá um retorno com seu orçamento. ',"85987067785",'55');
            $zap->enviarMensagem('*NÚMERO DO ORÇAMENTO: '.$contrato->id .'*',"85987067785",'55');

            return redirect()->route('site.orcamento')->with(['alerta'=>['tipo'=>'success','texto_principal'=>'Pedido de orçamento realizado com sucesso. Em breve retornaremos com seu orçamento','texto_segundario'=>'entrar em contato com o representante da empresa. Obrigado'],'formulario_off'=>true]);




        }catch (\Exception $e){

            return \redirect()->route('site.orcamento')->with(['alerta'=>['tipo'=>'danger','texto_principal'=>$e->getMessage(),'texto_segundario'=>'entrar em contato com o representante da empresa. Obrigado'],'formulario_off'=>false]);
        }
    }

    public function enviarLinkOrcamento(Request $r ,$numero)
    {
        try{

            $zap        =   new Whatsapp();
            $mensagem   =   "Acesse o link para fazer o seu cadastro. \n\n".route('site.orcamento',['whatsapp'=>$numero]);
            $retorno    =   $zap->enviarMensagem($mensagem,$numero,'+55');

            if($r->ajax()){
                return $retorno;
            }else{
                return "Enviado com sucesso!";
            }

        }catch (\Exception $e){
            if($r->ajax()){
                return $retorno;
            }else{
                return "Enviado com sucesso!";
            }
        }

    }

    public function cadastrarComentarioPost(Request $r)
    {


        try {
            $validacao      =   Validator::make($r->all(),[
                'nome' => ['required', 'min:3', 'max:255'],
                'email' => ['required', 'email'],
                'whatsapp'  => ['required'],
                'comentario' => ['required', 'min:1'],
            ]);
            $post           =   Postagem::find($r->input('id_post'));
            $formView       =   \view('front.includes.formulario-comentario',['postagem'=>$post]);
            $whatsapp       =   $r->get('whatsapp');
            $whatsapp       =   str_replace(['(',')','-',' '],'',$whatsapp);

            $comentariosView =   \view('front.includes.todos-comentarios');
            if($validacao->fails()){
                $formView = $formView->withErrors($validacao)->with($r->all())->render();
                return response()->json(['formulario'=>$formView]);
            }

            $cliente        =   Cliente::where('email',$r->input('email'))->first();
            if($cliente == null){
                $cliente        =   new Cliente();
                $cliente    =   $cliente->gravar($r->get('nome'),$r->input('email'));
            }

            $contato       =   Contato::cadastrar($whatsapp,$this->conf->whatsapp_id);
            $cliente->contatos()->attach($contato);
            $comentario     =   new Comentario();
            $comentario     =    $comentario->cadastrar($r->get('comentario'),$post,$cliente);

            $formView = $formView->with('success','cadastrado com sucesso')->render();
            $comentariosView =   $comentariosView->with('postagem',$post)->render();


            Mail::to($this->conf->email,$this->conf->nome_principal)->send(new \App\Mail\NovoComentarioPostagem($comentario));

            return response()->json([
                'formulario'=>$formView,
                'comentarios'=>$comentariosView,

            ]);

        }catch (\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }



}
