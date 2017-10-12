@extends('layouts.shablon0')

@section('content')

@include('flash::message')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
	<div class="12u">
		<section align="center"><h2>{{$title}}</h2></section>

		@if (!empty($ojects))		
		
		<section>	
		@foreach ($ojects as $key => $obj)
		
			<form id="myform{{$key}}" method="GET" action="{{action('FrontController@myShow', ['date' => $obj->date, 'table'=>$table])}}">
				
				<input type="hidden" name="title" value="{{$title}}">


			
				<div onclick="document.getElementById('myform{{$key}}').submit();">
					<a>{{$obj->date}}</a>
					<p>Створено: {{$obj->created_at}} <br>Оновлено: {{$obj->updated_at}}</p>
					<small><a href="{{action('FrontController@edit', ['table'=>$table, 'date'=>$obj->date])}}">Редагувати</a></small>
				</div>
			</form>
			<hr>
		
		@endforeach

		<a href="{{action('ReportController@create', ['table'=>$table, 'date'=>date('Y-m-d')])}}">Додати новий звіт</a>

		</section>

		
			<div class="myPaginate">
				{{$ojects->links()}}
			</div>
		
		
		@endif
	</div>
</div>
</div>
</div>
</div>

@endsection