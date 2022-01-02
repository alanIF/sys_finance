@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card danger">
                <div class="card-header">Despesas</div>

                <div class="card-body">
                   

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">descrição </th>

                            <th scope="col">data </th>
                            <th scope="col">valor</th>
                            

                            <th colspan='2'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($despesas as $d)
                        <tr>

                            <td >{{$d->id}}</td>
                            <td>{{$d->descricao}}</td>
                            <td>{{$d->data_despesa}}</td>

                            <td>{{$d->valor}}</td>


                            <td><a class="btn btn-warning " href="despesas/{{$d->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="despesas/delete/{{$d->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='6'><a class="btn btn-primary " href="{{url('despesas/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection