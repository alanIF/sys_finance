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

                            @for ($i = 0; $i < count($balanco['receitas']); $i++)
                                <th>{{$balanco['receitas'][$i]['data']}}</th>
                            @endfor   

                            </tr>
                        </thead>
                        <tbody>
                                                   
                        <tr>

                            
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection