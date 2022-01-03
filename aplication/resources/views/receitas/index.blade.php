@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Receitas</div>

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
                        @foreach($receitas as $r)
                        <tr>

                            <td >{{$r->id}}</td>
                            <td>{{$r->descricao}}</td>
                            <?php
                                $data = date('d/m/Y', strtotime($r->data_receita));
                                echo "<td>".$data."</td>";
                            ?>

                            <td>{{$r->valor}}</td>


                            <td><a class="btn btn-warning " href="receitas/{{$r->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="receitas/delete/{{$r->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='6'><a class="btn btn-primary " href="{{url('receitas/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection