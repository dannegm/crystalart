@extends('appanel/template')

@section('styles-oneui')
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/select2/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/oneui/js/plugins/redactor/redactor.css')}}">
@stop

@section('scripts')
    <script src="{{URL::asset('/oneui/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/bootstrap-datetimepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('/oneui/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>

	<script src="{{URL::asset('/oneui/js/plugins/redactor/redactor.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fontsize.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fontcolor.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/plugins/redactor/plugins/fullscreen.js')}}"></script>
	<script src="{{URL::asset('/oneui/js/dnn.upload.js')}}"></script>
	<script>
	// ONE UI Pickers

    $(function () {
        App.initHelpers(['datepicker', 'datetimepicker', 'select2', 'tags-inputs']);
    });


	// Redactor
	$(document).ready(function(){
		$('#description, #contact, #address').redactor({
			buttons: ['bold', 'italic', 'deleted', 'link'],
			convertLinks: true,
			minHeight: 50
		});
	});

	// Upload
	var pictureAPI = "{{route('appanel.picture.upload')}}";
	var options_cover = {
		url: pictureAPI,
		filename: 'file',
		group: 'Cover',
		maxSize: 8 * 1024 * 1024,
		maxWidth: 2048,
		start: function () {
		},
		process: function (picture) {
			$('#progress_cover').show();
		},
		error: function (error) {
			$('#error_txt_cover').text(error.message);
			$('#error_cover').fadeIn();
		},
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener('progress', function(p) {
				var percentComplete = p.loaded / p.total;
				var percent = parseFloat(Math.round((percentComplete * 100)));
				$('#progressbar_cover').css({
					'width': percent + '%'
				});
			}, false);
			return xhr;
		},
		success: function (response) {
			$('#progress_cover').hide();
			$('#pic_cover').val(response.id);
			$('#img_cover').css({
				'background-image': 'url(' + response.pic + ')'
			});
		}
	};

	$(function () {
		// Cover
		$('#picker_cover').on('click', function (e) {
			e.preventDefault();
			$('#file_cover').trigger('click');
		});
		$('#file_cover').on('change', function (e) {
			e.preventDefault();
			options_cover.files = this.files;
			upload( options_cover );
		});

		// Permalink

		$('#permalink-edit').on('click', function () {
			$('#permalink-preview').hide();
			$('#permalink-form').fadeIn();
		});
		$(document).on('keyup', '#permalink', function () {
			if ($(this).val().match(/#[A-Za-z0-9\-]+#/g)) {
				$('#permalink-form').addClass('has-error');
			} else {
				$('#permalink-form').removeClass('has-error');
			}
		});
	});

	@if($errors->has())
	$(function () {
		$('#modal-errors').modal('show');
	});
	@endif


	</script>
@stop

@section('breadcrumb')
	<li><a href="{{route('appanel')}}">Inicio</a></li>
	<li><a href="{{route('appanel.schedules.index')}}">Schedules</a></li>
	<li>Editar</li>
	<li class="active">{{$schedule->uid}}</li>
@stop

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-lg-8">
				<div class="block block-bordered">
					<div class="block-header bg-gray-lighter">
						<ul class="block-options">
						</ul>
						<h3 class="block-title"></h3>
					</div>

					<!-- form -->
					<div class="block-content">
						{{Form::open(array(
							'route' => array('appanel.schedules.update', $schedule->uid),
							'method' => 'PUT',
							'class' => 'form-horizontal push-10-t push-10',
						))}}
							<div class="row">
								<div class="col-md-12">
									<!-- Título de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<div class="form-material">
												<label for="title">Nombre</label>
												<input class="form-control input-lg" type="text" id="name" name="name" placeholder="Nombre del evento" value="{{$schedule->name}}">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div id="permalink-preview">
												<span class="label label-info">Permalink</span>
												<span class="text-op">{{URL::asset('/schedule')}}/<b>{{$schedule->permalink}}</b></span>
												<button class="btn btn-default btn-xs" id="permalink-edit" type="button"><i class="fa fa fa-pencil"></i></button>
											</div>

											<div id="permalink-form" style="display: none;">
												<span class="label label-info">Permalink</span>
												<div class="input-group push-10-t">
													<span class="input-group-addon">
														<span class="font-s12">{{URL::asset('/')}}</span>
													</span>
													<input class="form-control input-sm" style="font-weight: bold; font-size: 12px;" type="text" id="permalink" name="permalink" placeholder="permalink" value="{{$schedule->permalink}}">
												</div>
												<div class="help-block">El permalink sólo debe tener letras y números sin espacios ni caracteres especiales</div>
											</div>
										</div>
									</div>

									<!-- Portada de la nota -->
									<div class="form-group" style="border-top: 1px solid #eee; border-bottom: 1px solid #eee; margin: 20px 0; padding-top: 20px">
										<label>Foto de portada</label>


										<div id="img_cover" class="img-container" style="height: 150px; background: #444 center no-repeat; background-size: cover;
											background-image: url('{{route('appanel.picture.uid', array('uid' => $schedule->cover_uid))}}');">
											<div class="img-options" style="opacity: 1;">
												<div class="img-options-content">
													<h3 class="font-w400 text-white push-5">Imagen de portada</h3>
													<h4 class="h6 font-w400 text-white-op push-15">Selecciona una imagen</h4>
													<button type="button" id="picker_cover" class="btn btn-sm btn-default"><i class="si si-magnifier"></i> Buscar imagen</a>
												</div>
											</div>
										</div>

										<div id="progress_cover" class="progress progress-mini animated fadeIn slideInDown" style="display: none;">
											<div id="progressbar_cover" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
										</div>

										<input type="hidden" id="pic_cover" name="pic_cover" value="{{$schedule->cover_uid}}" />
										<input type="file" id="file_cover" name="file_cover" class="visibility-hidden" />

										<div id="error_cover" class="alert alert-danger alert-dismissable" style="display: none;">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h3 class="font-w300 push-15">Error</h3>
											<p id="error_txt_cover"></p>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<label for="description">Descripción</label>
											<textarea id="description" name="description" placeholder="Descripción del evento">{{$schedule->description}}</textarea>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<label for="address">Dirección</label>
											<textarea id="address" name="address" placeholder="Dirección del evento">{{$schedule->address}}</textarea>
										</div>
									</div>

									<!-- Descripción de la nota -->
									<div class="form-group">
										<div class="col-sm-12">
											<label for="contact">Contacto</label>
											<textarea id="contact" name="contact" placeholder="Datos de contacto">{{$schedule->contact}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6">
											<label for="date">Fecha del evento</label>


	                                        <div class="js-datepicker input-group date" data-show-today-button="true" data-show-clear="true" data-show-close="true" data-side-by-side="true">
	                                            <input class="form-control" type="text" id="date" name="date" placeholder="Seleciona fecha y hora..." value="{{$schedule->date}}">
	                                            <span class="input-group-addon">
	                                                <span class="fa fa-calendar"></span>
	                                            </span>
	                                        </div>

										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<a class="btn btn-default" href="{{route('appanel.schedules.index')}}">Cancelar</a>
											<button class="btn btn-primary" type="submit">Actualizar evento</button>
										</div>
									</div>
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('modals')

	@if($errors->has())
		<?php $dis = '' ?>
		@foreach ($errors->all() as $error)
			<?php $dis .= "<li>{$error}</li>" ?>
		@endforeach

		<div class="modal" id="modal-errors" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="block block-themed remove-margin-b">
		                <div class="block-header bg-danger">
		                    <ul class="block-options">
		                        <li>
		                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
		                        </li>
		                    </ul>
		                    <h3 class="block-title">Verfica lo siguiente</h3>
		                </div>
		                <div class="block-content">
		                	<ul>
								{{$dis}}
							</ul>
						</div>
		            </div>
		            <div class="modal-footer">
		                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Aceptar</button>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@stop