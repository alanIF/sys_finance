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
        for($i=0; $i<count($receitas);$i++){

            $mes = explode('/',$receitas[$i]->data_receita,2);
            $receitas_m= array();
            if(strcmp($mes[1], $mes_atual)!=0){
                $mes_atual=$mes[1];
                $receitas_m['data']=$mes[1];

                $receitas_m['total_receita']=0;

                for($j=0; $j<count($receitas);$j++){
                    //
                    $mes_j = explode('/',$receitas[$j]->data_receita,2);
                    if(strcmp($receitas_m['data'], $mes_j[1])==0){
                        $receitas_m['total_receita']= $receitas[$j]->valor + $receitas_m['total_receita'];
                    }
                }

                array_push($receitas_t,$receitas_m);
            }

        }


        $sql = 'Select * from despesa d where d.user_id='.$user.'';
        $despesas = \DB::select($sql);
        $despesas_t=array();

        $total_m=0;
        $meses=array();
        $mes_atual="00/2022";
        
        // pegando os meses
        for($i=0; $i<count($despesas);$i++){

            $mes = explode('/',$despesas[$i]->data_despesa,2);
            $despesas_m= array();
            if(strcmp($mes[1], $mes_atual)!=0){
                $mes_atual=$mes[1];
                $despesas_m['data']=$mes[1];

                $despesas_m['total_receita']=0;

                for($j=0; $j<count($despesas);$j++){
                    //
                    $mes_j = explode('/',$despesas[$j]->data_despesa,2);
                    if(strcmp($despesas_m['data'], $mes_j[1])==0){
                        $despesas_m['total_receita']= $despesas[$j]->valor + $despesas_m['total_receita'];
                    }
                }

                array_push($despesas_t,$despesas_m);
            }

        }




        $balanco = array();
        $balanco['receitas']= $receitas_t;
        $balanco['despesas']= $despesas_t;
        return view('balanco.index', ['balanco' => $balanco]);
    }
}
