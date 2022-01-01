@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Receita</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @if(Request::is('*/edit'))
            <form action="{{url('receitas/update')}}/{{$receita->id}}" method="post">
            @csrf
            
         
            <div class="mb-3">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{$receita->descricao}}" required>
            </div>
           
            <div class="mb-3">
                <input type="number" class="form-control" name="valor" placeholder="Valor" value="{{$receita->valor}}" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="data_receita" placeholder="Data Receita" value="{{$receita->data_receita}}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('receitas/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('receitas/add')}}" method="post"> 
            @csrf
            
         
            <div class="mb-3">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
           
            <div class="mb-3">
                <input type="number" class="form-control" name="valor" placeholder="Valor" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="data_receita" placeholder="Data Receita"  required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('receitas/')}}">Voltar</a>

            
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection