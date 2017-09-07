@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section >	
		<h2 align="center" >{{$title}}</h2>
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
			@foreach ($reports as $key=>$report)
			<tr>
				<td>
					{{$key+1}}
				</td>
				<td>
					{{$report->date}}
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
		</table>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection