@extends('layouts.shablon0')

@section('content')

@include('flash::message')

<div id="features-wrapper">
<div id="features">
<div class="container">
<div id="dropdown-menu1" class="dropdown-menu1">

<div class="row">
            <a id="mypanel" href="#"><img id="panel" class="ico" src="{{asset('css/ico/panel.png')}}">&nbsp Панель
            </a>
</div>
<div class="row">
    <div class="2u 12u(mobile)">

        <!-- Feature #1 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'Report1'])}}" class="bordered-feature-image"><img src="{{asset('images/stat.png')}}" alt="" /></a>
            <p>
                Статистика
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'Report2'])}}" class="bordered-feature-image"><img src="{{asset('images/tolate.png')}}" alt="" /></a>
            <p>
                Інформація по запізненнях бригад на виклики
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
           <a href="{{action('FrontController@show', ['id'=>'Report3'])}}" class="bordered-feature-image"><img src="{{asset('images/transfer.png')}}" alt="" /></a>
            <p>
                Транспортування на Луцьк (Київ)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report4'])}}" class="bordered-feature-image"><img src="{{asset('images/gks.png')}}" alt="" /></a>
            <p>
                ГКС
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>                
            <a href="{{action('FrontController@show', ['id'=>'fatal'])}}" class="bordered-feature-image"><img src="{{asset('images/fatal.png')}}" alt="" /></a>
            <p>
                Смертність в присутності бригади (успішна реанімація)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report6'])}}" class="bordered-feature-image"><img src="{{asset('images/remark.png')}}" alt="" /></a>
            <p>
                Зауваження по роботі, скарги, подяки
            </p>
        </section>
    </div>
</div>
<div class="row">
    <div class="2u 12u(mobile)">

        <!-- Feature #1 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'dtp+ns'])}}" class="bordered-feature-image"><img src="{{asset('images/dtp_ns.png')}}" alt="" /></a>
            <p>
                ДТП і «НС» (надзвичайні стани)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'high_travmy'])}}" class="bordered-feature-image"><img src="{{asset('images/higch.png')}}" alt="" /></a>
            <p>
                Складні травми
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'tr_kytyzi'])}}" class="bordered-feature-image"><img src="{{asset('images/kytyzi.png')}}" alt="" /></a>
            <p>
                Травми китиці
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'opic'])}}" class="bordered-feature-image"><img src="{{asset('images/opic.png')}}" alt="" /></a>
            <p>
                Опіки/ Переохолодження
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'travmat'])}}" class="bordered-feature-image"><img src="{{asset('images/criminal.png')}}" alt="" /></a>
            <p>
                Травматизм (кримінальний, виробничий)
            </p>
        </section>
    </div>    
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'allReports'])}}" class="bordered-feature-image"><img src="{{asset('images/all.png')}}" alt="" /></a>
            <p>
                Повний рапорт старших лікарів
            </p>
        </section>
    </div>    
</div>

</div>
</div>
</div>
</div>

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">
	<section align="center"><h2>{{$title}}</h2></section>
	<div class="btn-group" onclick="location.href='{{action('ReportController@create', ['table'=>$table, 'date'=>date('Y-m-d')])}}'" onchange="location.pathname=this.options[this.selectedIndex].value"; >
		<span>
			<img src="{{asset('css/ico/add.png')}}">
			Додати новий
		</span>
	</div>
	Сортувати:&nbsp
	<select name="viddil" onchange="location.pathname=this.options[this.selectedIndex].value">
		<option value="">Виберіть фільтр:</option>
		<option id="opt1" value="show/{{$table}}">
			По даті
		</option>
		<option id="opt2" value="show/{{$table}}/sort">
			По відділеннях
		</option>
	</select>

	@if (!empty($ojects))
		<section>
			@foreach ($ojects as $key => $obj)
				@if(!empty($obj->viddil))
					<div onclick="window.location='{{action('FrontController@sortShow', ['viddil' => $obj->viddil, 'table'=>$table, 'date' => $obj->date])}}'">				
					<p> Відділ - {{$obj->viddil}} </p>
                @elseif(!empty($obj->punkt))
                    <div onclick="window.location='{{action('FrontController@sortShow', ['viddil' => $obj->punkt, 'table'=>$table, 'date' => $obj->date])}}'">             
                    <p> Відділ - {{$obj->punkt}} </p>
				@elseif(!empty($obj->subdiv))
                    <div onclick="window.location='{{action('FrontController@sortShow', ['viddil' => $obj->subdiv, 'table'=>$table, 'date' => $obj->date])}}'">             
                    <p> Відділ - {{$obj->subdiv}} </p>
                @else
					<div onclick="window.location='{{action('FrontController@myShow', ['date' => $obj->date, 'table'=>$table])}}'">
				@endif	
                    <p>Звіт за дату - {{$obj->date}}</p>
					<p>Створено: {{$obj->created_at}} <br>Оновлено: {{$obj->updated_at}}</p>
					<small><a href="{{action('FrontController@edit', ['table'=>$table, 'date'=>$obj->date])}}">Редагувати</a></small>
				</div>
				<hr>		
			@endforeach
		</section>
			<div class="myPaginate" align="center">
				{{$ojects->links()}}
			</div>
	@endif
</div>
</div>
</div>
</div>
</div>

@endsection