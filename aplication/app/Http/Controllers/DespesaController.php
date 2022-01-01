<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespesaController extends Controller
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
        $receita= $receita->create($request->all());
        return Redirect::to('/receitas');
    }
    public function update($id ,Request $request){
        $receita= Receita::findOrFail($id);
        $receita->update($request->all());
        \Session::flash('msg_update', 'Receita Atualizado com sucesso!');
        return Redirect::to('/receita');
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
