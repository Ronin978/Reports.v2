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
			<p>
				Такої сторінки не знайдено. <br>
				За додатковою інформацією звернітья до адміністратора.
			</p><br>
			<p>
				Про всі помилки повідомляти розробника. Для ефективного усунення несправностей зробити скріншот та описати які дії призвели до несправності.
			</p>

			<div class="btn-group" onclick="window.history.go(-1); return false;">
                <span>
                    Назад
                    <img src="{{asset('css/ico/back.png')}}">   
                </span>                  
            </div> 
		</section>

	</div>
</div>
</div>
</div>
</div>

@endsection