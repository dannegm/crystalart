@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Schedules</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		<a href="{{route('appanel.schedules.create')}}" class="btn btn-default" role="button">Nuevo evento</a>
	</div>
</div>

<div class="content">
	<div class="row">

	@foreach($schedules as $schedule)
		<div class="col-sm-6 col-lg-3">
			<div class="block block-bordered">
                <div class="block-header">
                    <ul class="block-options">
                        <li><a href="{{route('appanel.schedules.edit', array('id' => $schedule->uid))}}"><i class="si si-pencil"></i></a></li>
                        <li><a href="{{route('appanel.schedules.destroy', array('id' => $schedule->uid))}}" class="trash-schedule"><i class="si si-trash text-danger"></i></a></li>
                    </ul>
                </div>
				<div id="img_cover" class="img-container" style="height: 100px; background: #444 center no-repeat; background-size: cover;
					background-image: url('{{URL::asset('/pictures/small/' . $schedule->cover->url)}}');">
					<div class="img-options" style="opacity: 1;">
						<div class="img-options-content">
							<h4 class="h5 font-w400 text-white-op push-15 push-20-l push-20-r">{{$schedule->name}}</h4>
						</div>
					</div>
				</div>
            	<ul class="nav-users">
            	<li><a href="{{route('appanel.user.edit', array('id' => $schedule->author->uid))}}">
                    <img class="img-avatar img-avatar42" src="{{URL::asset('/pictures/sqm/' . $schedule->author->picture->url)}}" alt="">
                    <i class="fa fa-circle text-success"></i> {{$schedule->author->name}}
                    <div class="font-w400 text-muted"><small>{{$schedule->humanDate()}}</small></div>
                </a></i>
               	</ul>
            </div>
        </div>
    @endforeach

        <div class="col-xs-12">
            <div class="pagination">{{$schedules->links()}}</div>
        </div>
	</div>
</div>
@stop