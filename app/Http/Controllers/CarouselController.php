<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\ImagensNota;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class CarouselController extends Controller
{
    private $total_registros;

    public function __construct()
    {
        $this->middleware('auth');
        $this->total_registros  =   Carousel::all()->count();
    }

    public function index(Request $r){
        $dados = [
            'titulo' => "Banners",
            'titulo_tabela' => "Lista de Banners"
        ];
        $banners   =   Carousel::orderBy('sequencia','asc')->get();
        return view('admin.carousel.index',$dados)->with('banners',$banners);
    }

    public function editar(Carousel $carousel){
        $banner   =  $carousel;
        try {
            $dados = [
                'titulo' => "Editar Banner",
                'banner' =>  $banner,
                'total_registros' => $this->total_registros,
            ];
            return view('admin.carousel.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('banner.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){

        $dados = [
            'titulo'            => "Nova Bannser",
            'total_registros'   => $this->total_registros+1,

        ];
        return view('admin.carousel.formulario',$dados);
    }

    public function cadastrar(Request $r){

        try {
            $validacao =        Validator::make($r->all(),[
                'titulo' => 'required',
                'texto' => 'required',
                'imagem'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

            ]);

            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }


                $image      =   $r->file('imagem');
                if (!file_exists(public_path('/images/banners/'))){
                    mkdir(public_path('/images/banners/'), 0777, true);
                }
                $filename="";
                $filename = Str::random(16).'.'.$image->getClientOriginalExtension();

                $resize  =  Image::read($image)->resize(1116,500);
                $resize->save(public_path('/images/banners/').$filename);


            $carousel          =   new Carousel();

            if ($carousel->cadastrar(
                $r->get('titulo'),
                $r->get('texto'),
                $r->get('sequencia'),
                $r->has('ativo')?true:false,
                $filename,
                $r->has('possui_link')?true:false,
                $r->get('link'),
                $r->get('alt'),
            )){
                return redirect()->route('banner.editar',['carousel'=>$carousel])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Carousel cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('banner.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r, Carousel $carousel){
        try {

            $validacao =        Validator::make($r->all(),[
                'titulo' => 'required',
                'texto' => 'required',
                'imagem'    =>  'image|mimes:jpeg,png,jpg|max:2048',

            ]);

            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }

            $filename="";
            if ($r->hasFile('imagem')) {


                if(\File::exists(public_path('/images/banners/').$carousel->imagem)){
                    \File::delete(public_path('/images/banners/').$carousel->imagem);

                }
                $image      =   $r->file('imagem');
                if (!file_exists(public_path('/images/banners/'))){
                    mkdir(public_path('/images/banners/'), 0777, true);
                }

                $filename = Str::random(16).'.'.$image->getClientOriginalExtension();

                $resize  =  Image::read($image)->resize(1116,500);
                $resize->save(public_path('/images/banners/').$filename);


            }else{
                $filename   =   $carousel->imagem;
            }


            if ($carousel->cadastrar(
                $r->get('titulo'),
                $r->get('texto'),
                $r->get('sequencia'),
                $r->has('ativo')?true:false,
                $filename,
                $r->has('possui_link')?true:false,
                $r->get('link'),
                $r->get('alt'),
            )){
                return redirect()->route('banner.editar',['carousel'=>$carousel])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Carousel atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('banner.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(Carousel $carousel){
        try {
            if(\File::exists(public_path('/images/banners/').$carousel->imagem)){
                \File::delete(public_path('/images/banners/').$carousel->imagem);
            }
            $carousel->delete();
            return redirect()->route('banner.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>'excluido com sucesso']);
        }catch (\Throwable $th) {
            return redirect()->route('banner.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

}
