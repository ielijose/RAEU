@extends('backend.layouts.master')

@section('css')
<link href="/assets/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
<link href="/assets/plugins/pickadate/themes/default.css" rel="stylesheet">
<link href="/assets/plugins/pickadate/themes/default.date.css" rel="stylesheet">
<link href="/assets/plugins/pickadate/themes/default.time.css" rel="stylesheet">
@endsection

@section('content')

<div id="main-content" class="dashboard">

    <div class="row">
        <div class="col-md-12">

            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-dark">
                        <div class="icon"><i class="fa fa-book"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ count(Ayuda::all())}}</div>
                                <a href="/ayudas"><h3>Ayudas</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-blue">
                        <div class="icon"><i class="fa fa-user"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ count(Student::all())}}</div>
                                <a href="/estudiantes"><h3>Estudiantes</h3></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-red">
                        <div class="icon"><i class="fa fa-plus"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">Nuevo</div>
                                <a href="/estudiantes/create"><h3>Alumno</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-orange">
                        <div class="icon"><i class="fa fa-plus"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">Nueva</div>
                                <a href="/ayudas/create"><h3>Ayuda</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>





    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                            <h2>Hola {{ Auth::user()->name() }}! Bienvenido al sistema de control de Ayudas.</h2>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')

<script src="{{ asset('assets/plugins/metrojs/metrojs.min.js') }}"></script>

<script src="{{ asset('assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.angular.js') }}"></script>


<script src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js')}}"></script>

@stop

