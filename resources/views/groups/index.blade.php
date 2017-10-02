@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
 <section >  
		<table id="groupTable">
			<tr>
				<td>ID</td>
				<td>Title</td>
				<td>TextTable</td>
				<td>Операції</td>
			</tr>
			@foreach($groups as $group)
			<tr>
				<td>{{$group->id}}</td>
				<td>
					<div>{{$group->group}}</div>
				</td>
				<td width="500px" >
					<div align="left">{{$group->title}}</div>
				</td>
				<td><a href="{{action('GroupController@edit', ['id'=>$group->id])}}">Редагувати</a></td>
			</tr>
			@endforeach
		</table>

		<a href="{{action('GroupController@create')}}">Створити</a>
</section>

</div>
</div>
</div>
</div>
</div>

@endsection