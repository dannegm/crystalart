@extends('home/template')

@section('metas')
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{Settings::get('page.title')}}" />
<meta property="og:image" content="{{URL::asset('/home/img/ca-logo.png')}}" />

<meta property="og:url" content="{{route('page.home')}}" />
<meta property="og:title" content="{{Settings::get('page.title')}}" />
@stop

@section('styles')
	<style id="style_slider">
		{{Fragment::get('home.slider')->css}}
	</style>
	<style id="style_frames">
		{{Fragment::get('home.frames')->css}}
	</style>
	<style id="style_mission">
		{{Fragment::get('home.mission')->css}}
	</style>
	<style id="style_getstarting">
		{{Fragment::get('home.getstarting')->css}}
	</style>
@stop

@section('scripts')
	<script src="{{URL::asset('/home/assets/js/plugins/FullscreenSlitSlider/js/modernizr.custom.79639.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/plugins/FullscreenSlitSlider/js/jquery.ba-cond.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/plugins/FullscreenSlitSlider/js/jquery.slitslider.js')}}"></script>

	<script id="script_slider">
		{{Fragment::get('home.slider')->js}}
	</script>
	<script id="script_frames">
		{{Fragment::get('home.frames')->js}}
	</script>
	<script id="script_mission">
		{{Fragment::get('home.mission')->js}}
	</script>
	<script id="script_getstarting">
		{{Fragment::get('home.getstarting')->js}}
	</script>
@stop

@section('content')
	<section id="sliderc">
		{{Fragment::get('home.slider')->html}}
	</section>
	<section id="frames">
		{{Fragment::get('home.frames')->html}}
	</section>
	<section id="mission">
		{{Fragment::get('home.mission')->html}}
	</section>
	<section id="getstarting">
		{{Fragment::get('home.getstarting')->html}}
	</section>
@stop
