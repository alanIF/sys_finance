@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card danger">
                <div class="card-header">Balanço</div>

                <div class="card-body">
                   

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th></th>
                            @for($i = 0; $i < count($balanco); $i++)
                                <th>{{$balanco[$i]['data']}}</th>
                            @endfor
                          

                            </tr>
                        </thead>
                        <tbody>
                                                   
                        <tr>  
                            <th>Receitas</th>  
                            @for ($i = 0; $i < count($balanco); $i++)
                                <th>{{$balanco[$i]['receitas']}}</th>
                            @endfor 
                        </tr>
                        <tr>  
                            <th>Despesas</th>  
                            @for ($i = 0; $i < count($balanco); $i++)
                            <th>{{$balanco[$i]['despesas']}}</th>
                            @endfor 
                        </tr>   
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection