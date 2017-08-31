@extends('layouts.shablon1')

@section('content')

@include('flash::message')

<div id="templatemo_main">
	@foreach ($ojects as $obj)
		<p>{{$obj->date}}</p>
	@endforeach
</div>

<div class="myPaginate">
	{{$ojects->links()}}
</div>
@endsection