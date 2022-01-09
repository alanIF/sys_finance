<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BancoController extends Controller
{
    public function index(){
        $user = Auth::id();

        $sql = 'Select sum(o.valor) saques from operacao o where o.user_id='.$user.' and o.tipo=2';
        $saques = \DB::select($sql);
        $sql = 'Select sum(o.valor) depositos from operacao o where o.user_id='.$user.' and o.tipo=1';
        $depositos = \DB::select($sql);
        $total_saques=0;
        $total_depositos=0;
        foreach($saques as $s){
            if($s->saques!=null){
                $total_saques=$s->saques;

            }
        }
        foreach($depositos as $d){
            if($d->depositos!=null){
                $total_depositos=$d->depositos;

            }
        }
        $saldo= $total_depositos-$total_saques;
        $dados=array();
        $dados['saldo']=$saldo;
        $dados['saques']=$total_saques;
        $dados['depositos']=$total_depositos;
        return view('banco.index', ['dados' => $dados]);
    }
}
