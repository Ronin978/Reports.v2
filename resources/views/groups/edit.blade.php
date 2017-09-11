@extends('layouts.shablon1')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
 	<section >  
		<form method="POST" action="{{action('GroupController@update',['id'=>$group->id])}}"/>
				
				<input type="text" name="group" value="{{$group->group}}">
				<textarea name="title">{{$group->title}}"</textarea>
			
			<input type="hidden" name="_method" value="put"/>
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<input type="submit" value="Зберегти">
			
		</form>
	</section>
</div>
</div>
</div>
</div>
</div>

@endsection