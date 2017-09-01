@extends('layouts.shablon1')

@section('content')

@include('flash::message')
<div id="templatemo_wrapper">
	<div id="templatmeo_menu">
		{{$title}}
	</div>

	@if (!empty($ojects))
	<div id="templatemo_main">
		@foreach ($ojects as $key => $obj)
			<div>
				<a href="{{action('FrontController@myShow', ['date'=>$obj->date, 'table'=>$id, 'title'=>$title])}}">{{$obj->date}}</a>
				<p>Створено: {{$obj->created_at}}</p>
				<p>Оновлено: {{$obj->updated_at}}</p>
			</div>
			<hr>
		@endforeach
	</div>

	
	<div class="myPaginate">
		{{$ojects->links()}}
	</div>
	@endif
</div>
@endsection