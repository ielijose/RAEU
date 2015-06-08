@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.tableTools.css') }}">

@stop

@section('content')

<div id="main-content">
    @include('backend.layouts.alert')
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3 class="pull-left"><strong>Ayudas</strong></h3>
                <a href="/ayudas/create" id="rent" class="btn btn-success pull-right m-t-10">Nueva ayuda</a>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-blue">
                            <h3 class="panel-title"><strong>Lista</strong> de ayudas</h3>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">

                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic no-sort">
                                        <thead>
                                            <tr>
                                                <th>Estudiante</th>
                                                <th>Tipo</th>
                                                <th>Descripcion</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ayudas as $key => $ayuda)
                                            <tr>
                                                <td>{{ $ayuda->student->name }}</td>
                                                <td>{{ $ayuda->type }}</td>
                                                <td>{{ $ayuda->description }}</td>
                                                <td>{{ $ayuda->getHumanDate() }}</td>
                                                <td>
                                                    {{ $ayuda->getStatus() }}
                                                @if($ayuda->status == 'proccess')
                                                    <a href="/ayudas/aprobar/{{$ayuda->id}}" class="btn btn-info btn-sm">Aprobar</a>
                                                @endif
                                                </td>
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


@stop

@section('javascript')
    <script src="{{ asset('/assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dataTables.tableTools.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/table.editable.js') }}"></script>
    <script src="{{ asset('/assets/js/table_dynamic.js') }}"></script>


    <script>
$(document).on("ready", function(){
    /* Filtrado */
    $("#modal-rent").modal();
    $("#modal-rent").modal('hide');

    $("#rent").on("click", function(){
        $("#modal-rent").modal();
    });

});
</script>
@stop