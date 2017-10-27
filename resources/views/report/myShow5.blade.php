@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">	
		<h2 align="center">
				@if($table == 'fatal') 
					Смертність в присутності бригади (успішна реанімація)
				@elseif($table == 'dtp+ns')
					ДТП і «НС» (надзвичайні стани)
				@elseif($table == 'high_travmy')
					Складні травми
				@elseif($table == 'tr_kytyzi')
					Травми китиці
				@elseif($table == 'opic')
					Опіки/ Переохолодження
				@elseif($table == 'travmat')
					Травматизм (кримінальний, виробничий)
				@elseif($table == 'ERROR')
					Сторінки не знайдено
				@endif

			за {{$date}}</h2>
		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @if(!empty($reports->first()))
				@foreach ($reports as $key=>$report)
				<tr>
					<td>
						{{$key+1}}
					</td>
					<td>
						{{$report->timer}}
					</td>
					<td>
						{{$report->title}}
					</td>
					<td>
						{{$report->adress}}
					</td>
					<td>
						{{$report->pib}}
					</td>
					<td>
						{{$report->no_card}}
					</td>
					<td>
						{{$report->brig}}
					</td>
					<td>
						{{$report->other}}
					</td>
				</tr>
				@endforeach
			@endif
		</table>
	</section>
	<section>  
	    <div class="btn-group"> 
	    @if (!empty($reports->first()))
	        @if($table == 'fatal') 
				<a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'dtp+ns'])}}">
			@elseif($table == 'dtp+ns')
				<a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'high_travmy'])}}">
			@elseif($table == 'high_travmy')
				<a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'tr_kytyzi'])}}">
			@elseif($table == 'tr_kytyzi')
				<a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'opic'])}}">
			@elseif($table == 'opic')
				<a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'travmat'])}}">
			@elseif($table == 'travmat')
				<a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'Report6'])}}">
			@endif
		@else
			<a href="{{action('FrontController@myShow', ['date' => date('Y-m-d'), 'table'=>'dtp+ns'])}}">
		@endif

	            Слідуюча таблиця
	        </a>
	        <div class="gotoback" onclick="window.history.go(-1); return false;">
	            <p>Назад</p>                        
	        </div>
	        <a onClick="CallPrint('pagePrint');">   
	            Роздрукувати
	        </a>
	    </div>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection