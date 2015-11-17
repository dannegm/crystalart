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

	
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Showrooms</h1>
				</div>
			</div>

			<div class="row">
				@forelse($showrooms as $showroom)
					<div class="col-sm-4">
						<div class="schedule">
							<h3>{{$showroom->name}}
								<br /><small>{{$showroom->humanDate()}}</small></h3>
							<img src="{{route('appanel.picture.uid', array('uid' => $showroom->cover_uid))}}" />
							<p>{{$showroom->description}}</p>
							<address>{{$showroom->address}}</address>
							<address>{{$showroom->contact}}</address>
						</div>
					</div>
				@empty
					<div class="col-sm-12">
						<p class="lead">No hay eventos en este mes</p>
					</div>
				@endforelse
			</div>

		</div>

	</div>
@stop
