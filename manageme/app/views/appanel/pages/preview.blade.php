<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>{{$page->title}} | Preview Pages</title>

	<link rel="stylesheet" href="{{URL::asset('/assets/less/main.less')}}" />
	<link rel="stylesheet" href="{{URL::asset('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('/assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet/less" href="{{URL::asset('/assets/less/main.less')}}" />
	<style>
	body {
		background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAIUlEQVQYV2NkwALevXv3H12YcSgoxOZwISEhDLczDgGFAPYSJviKriIMAAAAAElFTkSuQmCC);
		background-attachment: fixed;
	}
	main {
		padding: 1em;
	}
	{{$page->css}}
	</style>
</head>
<body>

	<main>
	{{$page->content}}
	</main>

	<script src="{{URL::asset('/assets/js/jquery.min.js')}}"></script>
	<script>
	{{$page->js}}
	</script>
</body>
</html>
