<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use Illuminate\Support\Facades\Auth;

use Redirect;

class ReceitaController extends Controller
{
    public function index(){
        $user = Auth::id();

        $sql = 'Select * from receita r where r.user_id='.$user.'';
        $receitas = \DB::select($sql);
        
        return view('receitas.index', ['receitas' => $receitas]);
    }
    // form de cadastrar
    public function new(){
        return view('receitas.form');
    }
    public function add(Request $request){
        $receita = new Receita();
        $user = Auth::id();

        $receita->descricao=$request->descricao;
        $receita->valor =$request->valor;
        $data_convetida= date('d/m/Y', strtotime($request->data_receita));
        $receita->data_receita =$data_convetida;
        $receita->user_id= $user;
        $receita->save();

       
        return Redirect::to('/receitas');
    }
    public function update($id ,Request $request){
        $receita= Receita::findOrFail($id);
        $user = Auth::id();

        $receita->descricao=$request->descricao;
        $receita->valor =$request->valor;
        $data_convetida= date('d/m/Y', strtotime($request->data_receita));
        $receita->data_receita =$data_convetida;
        $receita->user_id= $user;
        $receita->save();

        \Session::flash('msg_update', 'Receita Atualizado com sucesso!');
        return Redirect::to('/receitas');
    }
    public function edit($id){
        $receita= Receita::findOrFail($id);
        return view('receitas.form', ['receita'=> $receita]);
    }
    public function delete($id){
        $receita= Receita::findOrFail($id);
        $receita->delete();
        return Redirect::to('/receitas');
    }
}
