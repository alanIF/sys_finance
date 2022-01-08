@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Operação</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @if(Request::is('*/edit'))
            <form action="{{url('operacao/update')}}/{{$operacao->id}}" method="post">
            @csrf
            
         
            <div class="mb-3">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{$operacao->descricao}}" required>
            </div>
           
            <div class="mb-3">
                <input type="number" class="form-control" name="valor" placeholder="Valor" value="{{$operacao->valor}}" required>
            </div>
            <div class="mb-3">
                <select class="form-control" name="tipo" id="sel1">
                    <option value="1">Depósito</option>
                    <option value="2">Saque</option>
                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('operacao/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('operacao/add')}}" method="post"> 
            @csrf
            
         
            <div class="mb-3">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
           
            <div class="mb-3">
                <input type="number" class="form-control" name="valor" placeholder="Valor" required>
            </div>
            <div class="mb-3">
                <select class="form-control" name="tipo" id="sel1">
                    <option value="1">Depósito</option>
                    <option value="2">Saque</option>
                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('operacao/')}}">Voltar</a>

            
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection