@extends('appanel/template')

@section('breadcrumb')
<li><a href="{{route('appanel')}}">Inicio</a></li>
<li class="active">Showrooms</li>
@stop
@section('content')
<div class="content">
	<div class="btn-group">
		<a href="{{route('appanel.showrooms.create')}}" class="btn btn-default" role="button">Nuevo showroom</a>
	</div>
</div>

<div class="content">
	<div class="row">

	@foreach($showrooms as $showroom)
		<div class="col-sm-6 col-lg-3">
			<div class="block block-bordered">
                <div class="block-header">
                    <ul class="block-options">
                        <li><a href="{{route('appanel.showrooms.edit', array('id' => $showroom->uid))}}"><i class="si si-pencil"></i></a></li>
                        <li><a href="{{route('appanel.showrooms.destroy', array('id' => $showroom->uid))}}" class="trash-showroom"><i class="si si-trash text-danger"></i></a></li>
                    </ul>
                </div>
				<div id="img_cover" class="img-container" style="height: 100px; background: #444 center no-repeat; background-size: cover;
					background-image: url('{{URL::asset('/pictures/small/' . $showroom->cover->url)}}');">
					<div class="img-options" style="opacity: 1;">
						<div class="img-options-content">
							<h4 class="h5 font-w400 text-white-op push-15 push-20-l push-20-r">{{$showroom->name}}</h4>
						</div>
					</div>
				</div>
            	<ul class="nav-users">
            	<li><a href="{{route('appanel.user.edit', array('id' => $showroom->author->uid))}}">
                    <img class="img-avatar img-avatar42" src="{{URL::asset('/pictures/sqm/' . $showroom->author->picture->url)}}" alt="">
                    <i class="fa fa-circle text-success"></i> {{$showroom->author->name}}
                    <div class="font-w400 text-muted"><small>{{$showroom->humanDate()}}</small></div>
                </a></i>
               	</ul>
            </div>
        </div>
    @endforeach

        <div class="col-xs-12">
            <div class="pagination">{{$showrooms->links()}}</div>
        </div>
	</div>
</div>
@stop