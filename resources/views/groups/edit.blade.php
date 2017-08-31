@extends('layouts.shablon1')

@section('content')

@include('flash::message')


<form method="POST" action="{{action('GroupController@update',['id'=>$group->id])}}"/>
		
		<input type="text" name="group" value="{{$group->group}}">
		<input type="text" name="title" value="{{$group->title}}">
	
	<input type="hidden" name="_method" value="put"/>
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<input type="submit" value="Зберегти">
	
</form>

@endsection