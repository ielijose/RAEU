@extends('backend.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/plugins/magnific/magnific-popup.css') }}">

<link href="{{ asset('/assets/plugins/datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/plugins/pickadate/themes/default.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/plugins/pickadate/themes/default.date.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/plugins/pickadate/themes/default.time.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.tableTools.css') }}">

<link rel="stylesheet" href="{{ asset('/assets/plugins/jnotify/jNotify.jquery.css') }}">
<style>
    .btn.btn-lg {
      padding: 12px 20px;
    }
</style>
@stop

@section('content')

<div id="main-content">
    @include('backend.partials.alert')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-blue">
                    <h3 class="panel-title"><strong>Listado</strong> de usuarios</h3>
                    <a href="/user/create" class="btn btn-warning col-md-offset-4">Crear Usuario</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-left">



                            <table id="datatable" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th class="hidden-sm hidden-xs">Nombre</th>
                                        <th class="hidden-sm hidden-xs">Email</th>
                                        <th class="hidden-sm hidden-xs">Teléfono</th>
                                        <th class="hidden-sm hidden-xs" style="text-align:center">Miembro desde</th>
                                        <th class="hidden-sm hidden-xs" style="text-align:center">Acciones</th>
                                        <th class="hidden-md hidden-lg">Datos</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody" class="">
                                    @foreach ($users as $key => $user)
                                    <tr>

                                        <td class="hidden-sm hidden-xs">{{ $user->full_name }}</td>
                                        <td class="hidden-sm hidden-xs">{{ $user->email }} </td>
                                        <td class="hidden-sm hidden-xs">{{ $user->phone }}</td>
                                        <th class="hidden-sm hidden-xs" style="text-align:center">{{ $user->getComputerDate() }}</th>


                                        <td class="hidden-sm hidden-xs" style="text-align:center">
                                            <a href="/user/{{$user->id}}" class="btn btn-info"><i class="fa fa-edit"></i> Editar</a>
                                        </td>
                                        <td class="hidden-md hidden-lg">{{ $user->full_name }} <br>{{ $user->email }} <br>{{ $user->phone }} <br> {{ $user->getComputerDate() }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-prospect" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><strong>Editar prospecto</strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Teléfono</label>
                            <input type="text" class="form-control"  id="phone" name="phone" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <input type="hidden" id="id" value=""/>
                <button type="button" class="btn btn-primary" id="save" data-dismiss="modal"><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="md-overlay"></div> <!-- Overlay Element. Important: place just after last modal -->


@stop

@section('javascript')
<script src="{{ asset('/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('/assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/dataTables.tableTools.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/table.editable.js') }}"></script>
<script src="{{ asset('a/assets/js/table_users.js') }}"></script>

<script src="{{ asset('/assets/plugins/jnotify/jNotify.jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/notifications.js') }}"></script>
<script src="{{ asset('/assets/plugins/jnotify/jNotify.jquery.min.js') }}"></script>
@stop