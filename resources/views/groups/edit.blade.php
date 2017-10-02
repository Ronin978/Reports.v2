@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
 	<section >  
		<form method="POST" action="{{action('GroupController@update',['id'=>$group->id])}}"/>
				
				Назва таблиці:<br>
				<input type="text" name="group" value="{{$group->group}}"> <br><hr>
				Назви ланок таблиці: <br>
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