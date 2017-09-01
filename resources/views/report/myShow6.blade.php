@extends('layouts.shablon1')

@section('content')

@include('flash::message')
<div id="templatemo_wrapper">
	<div id="templatmeo_menu">
		{{$title}}
	</div>

	<div id="templatemo_main">
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
					{{$report->date}}
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
	</div>
	
</div>
@endsection