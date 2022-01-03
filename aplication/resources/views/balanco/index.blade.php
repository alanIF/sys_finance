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
                            @foreach($balanco as $b)
                            <th>{{$b['data']}}</th>
                            @endforeach
                          

                            </tr>
                        </thead>
                        <tbody>
                                                   
                        <tr>  
                            <th>Receitas</th>  
                            @foreach($balanco as $b)
                            <th>{{$b['receitas']}}</th>
                            @endforeach
                        </tr>
                        <tr>  
                            <th>Despesas</th>  
                            @foreach($balanco as $b)
                            <th>{{$b['despesas']}}</th>
                            @endforeach
                        </tr>   
                        <tr>  
                            <th>Saldo</th>  
                            @foreach($balanco as $b)
                            <th>{{$b['saldo']}}</th>
                            @endforeach
                        </tr>  
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection