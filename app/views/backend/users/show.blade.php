@extends('backend.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/plugins/font-awesome-animation/font-awesome-animation.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/jcrop/jquery.Jcrop.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/profile.min.css') }}">
@stop

@section('content')

<div id="main-content">
    @include('backend.partials.alert')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(array('url' => '/user/'.$user->id, 'method' => 'put', 'id' => 'user-update', 'class' => 'form-horizontal')) }}
            <!-- BEGIN TABS -->
            <!-- BEGIN TABS -->
            <div class="tabbable tabbable-custom form">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#general_settings" data-toggle="tab">Datos personales</a></li>
                </ul>
                <div class="tab-content">
                    <div class="space20"></div>
                    <div class="tab-pane active" id="general_settings">
                        <div class="row profile">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12 profile-info">

                                                    <h1>{{ $user->full_name }}</h1>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row profile-classic">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-title line">
                                                <div class="caption"><i class="fa fa-info c-gray m-r-10"></i> Datos personales</div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="control-label col-md-3 p-t-0">Miembro desde:</div>
                                                    <div class="col-md-6">{{ $user->getHumanDate() }}</div>
                                                </div>

                                                <div class="row">
                                                    <div class="control-label col-md-3">Nombre:</div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="control-label col-md-3">Correo Electronico:</div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="control-label col-md-3">Teléfono:</div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="control-label col-md-3">Descripción breve:</div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="description" value="{{ $user->description }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row profile-classic">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-title line">
                                                <div class="caption"><i class="fa fa-key c-gray m-r-10"></i> Seguridad</div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="control-label col-md-3">Contraseña:</div>
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="control-label col-md-3">Confirmar contraseña:</div>
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password_confirmation" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-12">
                                    <div class="align-center">
                                        <a href="/" class="btn btn-default m-r-20">Cancelar</a>

                                        <button class="btn btn-primary m-r-20 save-profile">Guardar</button>

                                        <a href="#" class="btn btn-danger delete"><i class="fa fa-times"></i> Eliminar usuario</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--END TABS-->
            <!--END TABS-->
            {{ Form::close() }}
        </div>
    </div>



    <div class="modal fade" id="modal-view" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Recortar imagen</strong> </h4>
                    </div>
                    <div class="modal-body ">

                        <div class="row">
                            <div class="col-md-12 text-center" id="image-body">

                            </div>
                        </div>

                    </div>
                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="save-crop">Recortar y guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

{{ Form::open(array('url' => '/user/'.$user->id, 'method' => 'delete', 'id' => 'user-delete')) }}
    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
{{ Form::close() }}

@stop

@section('javascript')
<script src="{{ asset('/assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('/assets/js/animations.js') }}"></script>

<script src="{{ asset('/assets/plugins/jcrop/jquery.Jcrop.min.js') }}"></script>

<script type="text/javascript">
var crop;
var id = '{{$user->id}}';

$(document).on("ready", function() {
    var h = $(window).height();
    h = (h / 100) * 60;
    $("#avatar figcaption i").on("click", function() {
        var angle = 0;
        if ($(this).hasClass('fa-rotate-right')) {
            angle = -90;
        } else {
            angle = 90;
        }

        $.post('/dashboard/admin-avatar/rotate/' + id, {
            angle: angle
        }, function(data, textStatus, xhr) {
            $("#avatar img").prop('src', data.avatar + '?nocahe=' + Math.random());
        }, 'json');
    });

    $("#avatar, #avatar figcaption, #avatar p").dropzone({
        url: "/dashboard/admin-avatar/" + id,
        createImageThumbnails: false,
        init: function() {

            this.on("success", function(file) {
                $(".font-animation").css('display', 'none');

                $.get('/dashboard/admin-avatar/' + id, function(data) {

                    $("#image-body").html('<img src="" id="image_crop2" style="max-width:100%"/>');

                    $("#image_crop2").prop('src', data.avatar + '?nocahe=' + Math.random());
                    $("#modal-view").modal();

                    $('#modal-view').on('shown.bs.modal', function(e) {
                        img_width = $('#modal-view img').parent().parent().parent().width();
                        console.log(img_width);
                        $('#modal-view img').width(img_width);
                        $('#modal-view img').height('auto');

                        crop = $('#image_crop2').Jcrop({
                            bgOpacity: 0.8,
                            bgColor: 'transparent',
                            addClass: 'jcrop-dark',
                            aspectRatio: 1 / 1,
                            onSelect: updateCoords
                        }, function() {
                            crop_2 = this;
                            crop_2.setSelect([img_width / 3, 65, img_width / 1.5, 65 + 285]);
                            crop_2.setOptions({
                                bgFade: true
                            });
                            crop_2.ui.selection.addClass('jcrop-selection');
                        });
                    });

                }, 'json');

            });

            this.on("addedfile", function(file) {
                $(".font-animation").css('display', 'inline-block');
            });
        }
    });

    function updateCoords(c) {
        jQuery('#x').val(c.x);
        jQuery('#y').val(c.y);
        jQuery('#w').val(c.w);
        jQuery('#h').val(c.h);
    };

    /* SAVE CROP */

    $("#save-crop").on("click", function() {
        var options = {
            x: $("#x").val(),
            y: $("#y").val(),
            w: $("#w").val(),
            h: $("#h").val(),
            i: img_width
        }
        $.post('/dashboard/admin-avatar/crop/' + id, options, function(data, textStatus, xhr) {
            console.log(data);
            $("#avatar img").prop('src', data.avatar + '?nocahe=' + Math.random());
            //crop.destroy();
        }, 'json');
    })


    $(".delete").on('click', function(event) {
        event.preventDefault();

        if (confirm("Desea eliminar el usuario? \nNo se puede revertir.")) {
            //location.href = $(this).attr('href');
            $("#user-delete").submit();
        }
    });
    /* ** */
    $("input[name=type_pay]").on("change", function(){
        var t = $(this).val();
        if(t == 'paypal'){
            $("#type-paypal").removeClass('hide');
            $("#type-ach").addClass('hide');
        }else if(t == 'ach'){
            $("#type-ach").removeClass('hide');
            $("#type-paypal").addClass('hide');
        }
    });

    /* RELAOD */
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });
});
</script>
@stop