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
		 <table id="twoTable" border="1">
            <tr class="firstTr">
                <td class="firstColumn">№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ картки</td>
                <td>Відділення</td>
                <td>Примітки</td>
            </tr> 
			@foreach ($reports as $key=>$report)
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
			@endforeach
		</table>
	</section>
	<section>                
	@if (!empty($reports->first()))
	    <a href="{{action('FrontController@index', ['date'=>$date])}}">Завершити</a>
	@endif
	    <div class="gotoback" onclick="window.history.go(-1); return false;">
	    	<p>Назад</p>                        
	    </div>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection