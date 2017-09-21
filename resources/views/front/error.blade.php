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
			Такої сторінки не знайдено
		</section>

	</div>
</div>
</div>
</div>
</div>

@endsection