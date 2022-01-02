<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\Receita;
use Illuminate\Support\Facades\Auth;


class BalancoController extends Controller
{
    public function index(){
        $user = Auth::id(); 

        $sql = 'Select * from receita r where r.user_id='.$user.'';
        $receitas = \DB::select($sql);

        $receitas_t=array();
     
        $total_m=0;
        $meses=array();
        $mes_atual="00/2022";
        
        // pegando os meses
        for($i=0; count($receitas);$i++){

            $mes = explode('/',$receitas[$i]->data_receita,2);
            $receitas_m= array();
            if(strcmp($mes[1], $mes_atual)!=0){
                $mes_atual=$mes[1];
                $receitas_m['data']=$mes[1];

                $receitas_m['total_receita']=0;
                for($j=0; count($receitas);$j++){
                    //
                    $mes_j = explode('/',$receitas[$j]->data_receita,2);
                    if(strcmp($receitas_m['data'], $mes_j[1])==0){
                        $receitas_m['total_receita']= $receitas[$j]->valor + $receitas_m['total_receita'];
                    }
                }
                return dd($receitas_m);

                array_push($receitas_t,$receitas_m);
            }

        }
        return dd($receitas_t);   
        $balanco['meses']= $meses;


        $sql = 'Select * from despesa d where d.user_id='.$user.'';
        $despesas = \DB::select($sql);
        
        $balanco = array();
        // array 0 - receitas array 1 - despesas
        array_push($balanco,$receitas);
        array_push($balanco,$despesas);
        return dd($balanco);
        return view('receitas.index', ['balanco' => $balanco]);
    }
}
