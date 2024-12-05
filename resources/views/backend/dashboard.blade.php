@extends('layouts.adminlte')

{{-- Customize layout sections --}}

@section('subtitle', 'Dashboard')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Dashboard')

{{-- Content body: main page content --}}

@section('content_body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- Pedidos --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ count($orders) }}</h3>
                            <h5>Pedidos</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">Más info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                {{-- Productos --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ count($products) }}</h3>
                            <h5>Productos</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="small-box-footer">Más info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>



                {{-- Servicios --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count($stock) }}</h3>
                            <h5>Manejo de Existencias</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('movements.index') }}" class="small-box-footer">Más info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{-- Novedades --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ count($stock_pend) }}</h3>
                            <h5>Stocks Pendientes</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('pendientes.index') }}" class="small-box-footer">Más info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
            {{-- Stock --}}
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ count($stock_pend) }}</h3>
                            <h5>Stocks</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('stock.index') }}" class="small-box-footer">Más info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



@stop

{{-- Push extra CSS --}}

@push('css')
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush
