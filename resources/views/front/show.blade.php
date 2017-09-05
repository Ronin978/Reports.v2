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
			<form id="myform" method="POST" action="{{action('FrontController@myShow', ['date' => $obj->date])}}">
				
				<input type="hidden" name="table" value="{{$id}}">
				<input type="hidden" name="title" value="{{$title}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>


			<div>
				<div onclick="document.getElementById('myform').submit();">
					<a>{{$obj->date}}</a>
				</div>
				<p>Створено: {{$obj->created_at}}</p>
				<p>Оновлено: {{$obj->updated_at}}</p>
			</div>
			</form>
			<hr>
		@endforeach
	</div>

	
	<div class="myPaginate">
		{{$ojects->links()}}
	</div>
	@endif
</div>
@endsection