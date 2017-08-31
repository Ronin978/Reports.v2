@extends('layouts.shablon1')

@section('content')

@include('flash::message')

<div id="templatemo_main">
	<form method="POST" action="{{action('GroupController@store')}}">

		<input type="text" name="group">
		<textarea name="title"></textarea> 
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>

		<input type="submit">
		
	</form>
</div>
@endsection