<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use Illuminate\Support\Facades\Auth;

use Redirect;


class DespesaController extends Controller
{
    public function index(){
        $user = Auth::id();

        $sql = 'Select * from despesa d where d.user_id='.$user.'';
        $despesas = \DB::select($sql);
        
        return view('despesas.index', ['despesas' =>  $despesas]);
    }
    // form de cadastrar
    public function new(){
        return view('despesas.form');
    }
    public function add(Request $request){
        $despesa = new Despesa();
        $user = Auth::id();

        $despesa->descricao=$request->descricao;
        $despesa->valor =$request->valor;
        $despesa->data_despesa =$request->data_despesa;
        $despesa->user_id= $user;
        $despesa->save();

       
        return Redirect::to('/despesas');
    }
    public function update($id ,Request $request){
        $despesa= Despesa::findOrFail($id);
        $user = Auth::id();

        $despesa->descricao=$request->descricao;
        $despesa->valor =$request->valor;
        $despesa->data_despesa =$request->data_despesa;
        $despesa->user_id= $user;
        $despesa->save();

        \Session::flash('msg_update', 'Despesa Atualizada com sucesso!');
        return Redirect::to('/despesas');
    }
    public function edit($id){
        $despesa= Despesa::findOrFail($id);
        return view('despesas.form', ['despesa'=> $despesa]);
    }
    public function delete($id){
        $despesa= Despesa::findOrFail($id);
        $despesa->delete();
        return Redirect::to('/despesas');
    }
    
}
