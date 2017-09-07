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
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection