@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Despesa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @if(Request::is('*/edit'))
            <form action="{{url('despesas/update')}}/{{$despesa->id}}" method="post">
            @csrf
            
         
            <div class="mb-3">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{$despesa->descricao}}" required>
            </div>
           
            <div class="mb-3">
                <input type="number" class="form-control" name="valor" placeholder="Valor" value="{{$despesa->valor}}" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="data_despesa" placeholder="Data Despesa" value="{{$despesa->data_despesa}}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('despesas/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('despesas/add')}}" method="post"> 
            @csrf
            
         
            <div class="mb-3">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
           
            <div class="mb-3">
                <input type="number" class="form-control" name="valor" placeholder="Valor" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="data_despesa" placeholder="Data Despesa"  required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('despesas/')}}">Voltar</a>

            
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection