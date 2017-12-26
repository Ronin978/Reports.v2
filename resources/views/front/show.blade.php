@extends('layouts.shablon0')

@section('content')

@include('flash::message')



<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">
	<section align="center"><h2>{{$title}}</h2></section>
	<div class="btn-group" onclick="location.href='{{action('ReportController@create', ['table'=>$table, 'date'=>date('Y-m-d')])}}'" onchange="location.pathname=this.options[this.selectedIndex].value"; >
		<span>
			<img src="{{asset('css/ico/add.png')}}">
			Додати новий
		</span>
	</div>
	Сортувати:&nbsp
	<select name="viddil" onchange="location.pathname=this.options[this.selectedIndex].value">
		<option value="">Виберіть фільтр:</option>
		<option id="opt1" value="show/{{$table}}">
			По даті
		</option>
		<option id="opt2" value="show/{{$table}}/sort">
			По відділеннях
		</option>
	</select>

	@if (!empty($ojects))
		<section>
			@foreach ($ojects as $key => $obj)
				@if(!empty($obj->viddil))
					<div onclick="window.location='{{action('FrontController@sortShow', ['viddil' => $obj->viddil, 'table'=>$table, 'date' => $obj->date])}}'">				
					<p> Відділ - {{$obj->viddil}} </p>
                @elseif(!empty($obj->punkt))
                    <div onclick="window.location='{{action('FrontController@sortShow', ['viddil' => $obj->punkt, 'table'=>$table, 'date' => $obj->date])}}'">             
                    <p> Відділ - {{$obj->punkt}} </p>
				@elseif(!empty($obj->subdiv))
                    <div onclick="window.location='{{action('FrontController@sortShow', ['viddil' => $obj->subdiv, 'table'=>$table, 'date' => $obj->date])}}'">             
                    <p> Відділ - {{$obj->subdiv}} </p>
                @else
					<div onclick="window.location='{{action('FrontController@myShow', ['date' => $obj->date, 'table'=>$table])}}'">
				@endif	
                    <p>Звіт за дату - {{$obj->date}}</p>
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