@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Operações</div>

                <div class="card-body">
                   

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">descrição </th>

                            <th scope="col">valor</th>
                            <th scope="col">tipo</th>
                            <th scope="col">data</th>


                            <th colspan='2'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($operacoes as $o)
                        <tr>

                            <td >{{$o->id}}</td>
                            <td>{{$o->descricao}}</td>
                            <td>{{$o->valor}}</td>
                            @if($o->tipo==1)
                                <td>Depósito</td>
                            @else
                                <td>Saque</td>
                            @endif
                            <td>{{(new DateTime($o->updated_at))->format('d/m/Y H:i:s')}}</td>

                            


                            <td><a class="btn btn-warning " href="operacao/{{$o->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="operacao/delete/{{$o->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='7'><a class="btn btn-primary " href="{{url('operacao/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection