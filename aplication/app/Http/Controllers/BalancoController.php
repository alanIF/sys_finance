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
        $sql2 = 'Select * from despesa d where d.user_id='.$user.'';
        $despesas = \DB::select($sql2);
        $balanco = array();

        $receitas_t=array();
        $despesas_t= array();

        $meses=array();
        $mes_atual="00/2022";
        $balanco_t= array();

        // pegando os meses
        for($i=0; $i<count($receitas);$i++){
            $balanco_m= array();
            $mes = explode('/',$receitas[$i]->data_receita,2);
            if(strcmp($mes[1], $mes_atual)!=0){
                $mes_atual=$mes[1];

                $balanco_m['data']=$mes[1];
                $balanco_m['total_receita']=0;
                $balanco_m['total_despesa']=0;

                for($j=0; $j<count($receitas);$j++){
                    //
                    $mes_j = explode('/',$receitas[$j]->data_receita,2);
                    if(strcmp($balanco_m['data'], $mes_j[1])==0){
                        $balanco_m['total_receita']= $receitas[$j]->valor + $balanco_m['total_receita'];
                    }

                }


                for($j=0; $j<count($despesas);$j++){
                    //
                    $mes_j = explode('/',$despesas[$j]->data_despesa,2);
                    if(strcmp($balanco_m['data'], $mes_j[1])==0){
                        $balanco_m['total_despesa']= $despesas[$j]->valor + $balanco_m['total_despesa'];
                    }


                }
                $balanco_t[$i]['data']= $balanco_m['data'];
                $balanco_t[$i]['despesas']= $balanco_m['total_despesa'];

                $balanco_t[$i]['receitas']= $balanco_m['total_receita'];
                $balanco_t[$i]['saldo']= $balanco_m['total_receita']- $balanco_m['total_despesa'];
              

            }
        }
        




        return view('balanco.index', ['balanco' => $balanco_t]);
    }
}
