@extends('layouts.shablon0')

@section('content')

@include('flash::message')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
	<div class="12u">
		<section align="center"><h2>{{$title}}</h2></section>

		<section>	
			<h3>Такої сторінки не знайдено. <br>
			За додатковою інформацією звернітья до адміністратора.</h3>
		</section>

	</div>
</div>
</div>
</div>
</div>

@endsection