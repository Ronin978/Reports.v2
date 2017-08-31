@extends('layouts.shablon1')

@section('content')


	
<div id="templatemo_wrapper">
	<div id="templatemo_main">
		<table border="1" class="table mytable">
			@foreach($groups as $group)
			<tr>
				<td>{{$group->id}}</td>
				<td>
					{{$group->group}}
				</td>
				<td>
					{{$group->title}}
				</td>
				<td><a href="{{action('GroupController@edit', ['id'=>$group->id])}}">Редагувати</a></td>
			</tr>
			@endforeach
		</table>

		<a href="{{action('GroupController@create')}}">Створити</a>
	</div>
</div>

@endsection