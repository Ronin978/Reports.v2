@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">	
		<h4 align="center" >Зауваження по роботі, скарги, подяки за {{$date}}</h4>
		@if(!empty($viddil))
		<h4 align="center">Відділення: {{$viddil}}</h4>
		@endif
		 <table id="twoTable" border="1">
            <tr class="firstTr">
                <td class="firstColumn">№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ картки</td>
                <td>Відділення</td>
                <td>Примітки</td>
            </tr> 
			@foreach ($reports as $key=>$report)
				@if (!empty($indicator)) 
				@if (($indicator == '1') && (empty($reports[$key-1]->date)))					
						<tr>
							<td colspan="5">{{$reports[$key]->date}}</td>
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
					{{$report->no_card}}
				</td>
				<td>
					{{$report->subdiv}}
				</td>
				<td>
					{{$report->other}}
				</td>
			</tr>
				@if ((!empty($reports[$key+1]->date)) && ($reports[$key]->date != $reports[$key+1]->date))
					<tr>
						<td colspan="5">{{$reports[$key+1]->date}}</td>
					</tr>
				@endif		
			@endforeach
		</table>
	</section>
	<section align="center">                
		<div class="btn-group" onClick="CallPrint('pagePrint');">   
            <span>
                <img src="{{asset('css/ico/print.png')}}">
                Роздрукувати
            </span>
        </div>
        <div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'Report6', 'date' => $reports[0]->date])}}'">
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
	    <div class="btn-group" onclick="location.href='{{action('FrontController@index')}}'">
            <span>
                <img src="{{asset('css/ico/down.png')}}">
                Завершити
            </span>
        </div><br>
	@endif
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection