@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">
		
	<h4 align="center" >Транспортування на Луцьк (Київ) за {{$date}}</h4>
		<table id="table3">
			 <tr id="firstTr">
                <td >№<br>п/п</td>
                <td>Дата/час</td>
                <td>№ карти виїзду</td>
                <td>ПІП хворого</td>
                <td>Звідки забрано</td>
                <td ><div id="maxLenght" class="rotate">Куди доставлено</div></td>
                <td ><div class="rotate">направлення</div></td>
                <td>Хто направляє</td>
                <td>Діагноз</td>
                <td>№ бр., керівник</td>
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
					{{$report->pib}}
				</td>
				<td>
					{{$report->at}}
				</td>
				<td>
					{{$report->from}}
				</td>
				<td>
					{{$report->direct}}
				</td>
				<td>
					{{$report->who_direct}}
				</td>
				<td>
					{{$report->diagnoz}}
				</td>
				<td>
					{{$report->brig}}
				</td>
				<td>
					{{$report->other}}
				</td>
			</tr>
			
			@endforeach
		</table>
	</section>
	<section>  
	    <div class="btn-group"> 
	    @if (!empty($reports->first()))
	        <a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'Report4'])}}">
	            Слідуюча таблиця
	        </a>
	    @endif
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