<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(Request $r)
    {
        try{

            return \view('front.login')->with('titulo','Login');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function logar(Request $r)
    {
        try{
            $validated = $r->validate([
                'email' => 'required',
                'senha' => 'required',
            ]);



           $atenticacao =   Auth::attempt(['email' => $validated['email'], 'password' => $validated['senha']]);

           if(!$atenticacao){
                   return   redirect()->route('site.login')->withInput($validated)->withErrors(['error'=>'Não autorizado']);
           }

           return redirect()->route('contrato.index');


        }catch (\ValidationException $e){
            return redirect()->back()->withErrors($e->validator);
        }
    }

    public function logout(Request $r   )
    {
        try {

            if(Auth::check()){
                Auth::logout();
            }

            return redirect()->route('site.login');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
