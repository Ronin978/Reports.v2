@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
 	<section >  
		<form method="POST" action="{{action('GroupController@store')}}">

			<input type="text" name="group">
			<textarea name="title"></textarea> 
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>

			<input type="submit">
			
		</form>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection