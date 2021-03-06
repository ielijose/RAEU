@extends('backend.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/plugins/magnific/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.tableTools.css') }}">
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/iconos.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/jnotify/jNotify.jquery.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/dropzone/dropzone.css') }}">

<style>
[class^="icon-"], [class*=" icon-"] {
    font-size: 30px;
}
</style>
@stop

@section('content')
<div id="main-content">
    <div class="page-title">
        <i class="icon-custom-left"></i>
        <h3>{{ $student->name }}</h3>
        <br>

        @include('backend.layouts.alert')

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabcordion">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#general" data-toggle="tab">Datos</a></li>
                    <li class=""><a href="#ayudas" data-toggle="tab">Ayudas</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="general">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/beneficiarios/update/{{ $student->id }}" method="POST" id="product-update" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nombre:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CI:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="ci" class="form-control" value="{{ $student->ci }}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Instituto/Comunidad:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="instituto" class="form-control"  value="{{ $student->instituto }}" required>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Genero:</label>
                                        <div class="col-sm-7">
                                             <select name="gender" id="">
                                                    <option @if($student->gender == 'male') {{"selected"}} @endif value="male">Masculino</option>
                                                    <option @if($student->gender == 'female') {{"selected"}}  @endif value="female">Femenino</option>
                                                </select>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Dirección:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="address" class="form-control" value="{{ $student->address }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Télefono:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Correo:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="email" class="form-control" value="{{ $student->email }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="ayudas">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">

                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($student->ayudas->count() == 0 )
                                            <tr>
                                                <td colspan="4" class="text-center"><a href="/ayudas/create?student={{$student->id}}" class="btn btn-lg btn-primary">Asignar Ayuda</a></td>
                                            </tr>
                                        @else
                                            @foreach ($student->ayudas as $key => $ayuda)
                                            <tr>
                                                <td>{{ $ayuda->type }}</td>
                                                <td>{{ $ayuda->description }}</td>
                                                <td>{{ $ayuda->getHumanDate() }}</td>
                                                <td>{{ $ayuda->getStatus() }}</td>
                                            </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 m-t-20 m-b-40 align-center">
            <a href="/beneficiarios" class="btn btn-default m-r-10 m-t-10"><i class="fa fa-reply"></i> Volver</a>
            <a href="/beneficiarios/delete/{{ $student->id }}" class="btn btn-danger delete-ad m-r-10 m-t-10"><i class="fa fa-times"></i> Eliminar beneficiario</a>
             <button class="btn btn-success m-t-10" id="submit-update"><i class="fa fa-check"></i> Guardar cambios</button>
        </div>
    </div>



</div>

@stop

@section('javascript')

<script src="{{ asset('/assets/plugins/magnific/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
<script src="{{ asset('/assets/js/ecommerce.js') }}"></script>

<script src="{{ asset('/assets/js/product.show.js') }}"></script>



@stop