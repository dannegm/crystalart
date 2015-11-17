@extends('home/template')

@section('metas')
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="{{Settings::get('page.title')}}" />
	<meta property="og:image" content="{{URL::asset('/img/logo.png')}}" />

	<meta property="og:url" content="{{route('page.home')}}" />
	<meta property="og:title" content="{{Settings::get('page.title')}}" />
@stop

@section('styles')
	<style>
	</style>
@stop

@section('scripts')
	<script>
	</script>
@stop

@section('content')
	<div style="margin-bottom: 100px;">

		<?php
		function m ($m) { $_m = explode(' ', 'none Enero Febrero Marzo Abril Mayo Junio Julio Agosto Septiembre Octubre Noviembre Diciembre'); return $_m[$m]; }
		$dt = $carbon;
		$mm = $schedules[0]->month;
		?>
	
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Schedule</h1>
				</div>
			</div>

			<div class="row">

				@for($i = 0; $i < 5; $i++)
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12 schedule-month">
							<h3><i class="fa fa-calendar"></i> {{m($mm);}}</h3>
						</div>

						<?php $c = 0; ?>
						@foreach($schedules as $schedule)
							@if ($schedule->month == $mm)
							<?php $c++; ?>
							<div class="col-sm-4">
								<div class="schedule">
									<h4>{{$schedule->name}} <small>{{$schedule->humanDate()}}</small></h4>
									<!-- <img src="{{route('appanel.picture.uid', array('uid' => $schedule->cover_uid))}}" /> -->
									<p>{{$schedule->description}}</p>
									<address>{{$schedule->address}}</address>
									<address>{{$schedule->contact}}</address>
								</div>
							</div>
							@endif
						@endforeach

						@if ($c == 0)
							<div class="col-sm-4">
								<p class="lead">No hay eventos en este mes</p>
							</div>
						@endif
					</div>
				</div>
				<?php $mm = $mm > 11 ? 1 : $mm + 1; ?>
				@endfor

			</div>
		</div>

	</div>
@stop
