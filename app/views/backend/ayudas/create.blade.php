@extends('backend.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/plugins/wizard/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/jquery-steps/jquery.steps.css') }}">

<link href="{{ asset('/assets/plugins/datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/plugins/pickadate/themes/default.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/plugins/pickadate/themes/default.date.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/plugins/pickadate/themes/default.time.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/iconos.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/dropzone/dropzone.css') }}">
<style>
[class^="icon-"], [class*=" icon-"] {
    font-size: 30px;
}

div#dropzone{
    text-align: center;
    border: 2px dashed #555;
    height: 350px;
}
div#dropzone:hover{
    background-color: #ddd;
}
</style>
@stop

@section('content')

<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-blue">
                    <h3 class="panel-title"><strong>Nueva</strong> ayuda</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="/ayudas" method="post" id="ayudas" class="form-horizontal" data-parsley-validate>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Beneficiario:</label>
                                    <div class="col-sm-10">
                                        <select name="student_id" id="" class="form-control">
                                            <?php $students = Student::all(); ?>
                                            @foreach($students as $student)
                                                <option value="{{$student->id}}"
                                                @if($student->id == $assigned)
                                                    selected
                                                @endif
                                                >{{$student->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tipo:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="type" data-parsley-minlength="1" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-sm-offset-3">
                                    <div class="pull-right">
                                        <a href="/estudiantes" class="btn btn-danger m-b-10">Cancelar</a>
                                        <button type="submit" class="btn btn-primary m-b-10">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop