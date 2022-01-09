@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content">
           
                    <?php
                       $depositos=$dados['depositos'];
                       $saques=$dados['saques'];
                       $saldo=$dados['saldo'];
                       
                    ?>

                           

                
                                <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$saldo}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <a  href="{{url('operacao/')}}"> <i class="fa fa-piggy-bank fa-4x text-warning"></i></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Depósitos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$depositos}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <a  href="{{url('operacao/new')}}"> <i class="fa fa-plus-square fa-4x text-success"></i></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saques</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$saques}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <a  href="{{url('operacao/new')}}"> <i class="fa fa-minus-square fa-4x text-danger"></i></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suas Movimentações Bancárias</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <a  href="{{url('operacao/')}}"> <i class="fa fa-money-bill-alt fa-4x text-success"></i></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection