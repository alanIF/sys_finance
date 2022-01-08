<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacao;
use Illuminate\Support\Facades\Auth;
use Redirect;

class OperacaoController extends Controller
{
    public function index(){
        $user = Auth::id();

        $sql = 'Select * from operacao c where c.user_id='.$user.'';
        $operacoes = \DB::select($sql);
        
        return view('operacao.index', ['operacoes' => $operacoes]);
    }
    // form de cadastrar
    public function new(){
        return view('operacao.form');
    }
    public function add(Request $request){
        $operacao = new Operacao();
        $user = Auth::id();
        
        $operacao->descricao=$request->descricao;
        $operacao->valor =$request->valor;
        $operacao->tipo =$request->tipo;
        $operacao->user_id= $user;
        $operacao->save();
        

       
        return Redirect::to('/operacao');
    }
    public function update($id ,Request $request){
        $operacao= Operacao::findOrFail($id);
        $user = Auth::id();

        $operacao->descricao=$request->descricao;
        $operacao->valor =$request->valor;
        $operacao->tipo =$request->tipo;
        $operacao->user_id= $user;
        $operacao->save();

        return Redirect::to('/operacao');
    }
    public function edit($id){
        $operacao= Operacao::findOrFail($id);
        return view('operacao.form', ['operacao'=> $operacao]);
    }
    public function delete($id){
        $operacao= Operacao::findOrFail($id);
        $operacao->delete();

        return Redirect::to('/operacao');
    }
}
