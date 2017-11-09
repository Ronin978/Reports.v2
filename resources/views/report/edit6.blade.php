@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>
    <form id="firstForm" method="POST" action="{{action('ReportController@update', ['table'=>'Report6', 'newDate'=>$date])}}">

        <p align="center">Зауваження по роботі, скарги, подяки {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
    
        <table id="table6">
            <tr id="firstTr">
                <td>№<br>п/п</td>
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
                    <textarea name="date{{$key}}" rows="1" data="elastic">{{$report->timer}}</textarea>
                </td>
                <td>
                    <textarea name="no_card{{$key}}" rows="1" data="elastic">{{$report->no_card}}</textarea>
                </td>
                <td>
                    <textarea name="subdiv{{$key}}" rows="1" data="elastic">{{$report->subdiv}}</textarea>
                </td>
                <td>
                    <textarea name="other{{$key}}" rows="1" data="elastic">{{$report->other}}</textarea>
                </td>
            </tr>                           
            @endforeach                     
        </table> 
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>
        
        <div class="btn-group small-btn-group" onclick="AddLine6()" align="center">
            <span>
                <img src="{{asset('css/ico/add.png')}}">
                Додати рядок   
            </span>
        </div>
        <br>
        <div class="panel" align="center">   
            <div class="btn-group" onclick="document.getElementById('firstForm').submit();">
                <span>
                    <img src="{{asset('css/ico/save.png')}}">Зберегти
                </span>
            </div>
        </div>
    </form>        
</section>
</div>
</div> 
</div>
</div>
</div>

@endsection