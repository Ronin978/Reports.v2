@extends('layouts.shablon0')

@section('content')

@include('flash::message')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">
	<section align="center"><h2>{{$title}}</h2></section>
	<div class="btn-group" onclick="location.href='{{action('ReportController@create', ['table'=>$table, 'date'=>date('Y-m-d')])}}'">
		<span>
			<img src="{{asset('css/ico/add.png')}}">
			Додати новий
		</span>
	</div>
	@if (!empty($ojects))
		<section>	
			@foreach ($ojects as $key => $obj)		
				<div onclick="window.location='{{action('FrontController@myShow', ['date' => $obj->date, 'table'=>$table])}}'">
					<a>{{$obj->date}}</a>
					<p>Створено: {{$obj->created_at}} <br>Оновлено: {{$obj->updated_at}}</p>
					<small><a href="{{action('FrontController@edit', ['table'=>$table, 'date'=>$obj->date])}}">Редагувати</a></small>
				</div>		
				<hr>		
			@endforeach
		</section>
			<div class="myPaginate" align="center">
				{{$ojects->links()}}
			</div>
	@endif
</div>
</div>
</div>
</div>
</div>

@endsection