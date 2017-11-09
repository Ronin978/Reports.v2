@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">	
		<h4 align="center">
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

			за {{$date}}</h4>
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
					@if (!empty($indicator)) 
					@if (($indicator == '1') && (empty($reports[$key-1]->date)))						
							<tr>
								<td colspan="8">{{$reports[$key]->date}}</td>
							</tr>
					@endif	
					@endif
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
					@if ((!empty($reports[$key+1]->date)) && ($reports[$key]->date != $reports[$key+1]->date))
						<tr>
							<td colspan="9">{{$reports[$key+1]->date}}</td>
						</tr>
					@endif		
				@endforeach
			@endif
		</table>
	</section>
	<section align="center">  
	    <div class="btn-group" onClick="CallPrint('pagePrint');">   
            <span>
                <img src="{{asset('css/ico/print.png')}}">
                Роздрукувати
            </span>
        </div>
        @if (!empty($reports->first()))
	        @if($table == 'fatal') 
				<div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'fatal', 'date' => $reports[0]->date])}}'">
			@elseif($table == 'dtp+ns')
				<div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'dtp+ns', 'date' => $reports[0]->date])}}'">
			@elseif($table == 'high_travmy')
				<div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'high_travmy', 'date' => $reports[0]->date])}}'">
			@elseif($table == 'tr_kytyzi')
				<div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'tr_kytyzi', 'date' => $reports[0]->date])}}'">
			@elseif($table == 'opic')
				<div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'opic', 'date' => $reports[0]->date])}}'">
			@elseif($table == 'travmat')
				<div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'travmat', 'date' => $reports[0]->date])}}'">
			@endif		
		@endif
            <span>
                <img src="{{asset('css/ico/edit.png')}}">
                Редагувати
            </span>
        </div><br>
	    <div class="btn-group" onclick="window.history.go(-1); return false;">
            <span>
                Назад
                <img src="{{asset('css/ico/back.png')}}">   
            </span>                  
        </div>
	    @if (!empty($reports->first()))
	        @if($table == 'fatal') 
				<div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'dtp+ns'])}}'">
			@elseif($table == 'dtp+ns')
				<div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'high_travmy'])}}'">
			@elseif($table == 'high_travmy')
				<div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'tr_kytyzi'])}}'">
			@elseif($table == 'tr_kytyzi')
				<div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'opic'])}}'">
			@elseif($table == 'opic')
				<div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'travmat'])}}'">
			@elseif($table == 'travmat')
				<div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'Report6'])}}'">
			@endif		
		@endif
			<span>
                <img src="{{asset('css/ico/next.png')}}">
                Далі
            </span>
        </div><br>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection