@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>     
    <form id="firstForm" method="POST" action="{{action('ReportController@update', ['table'=>'Report3', 'newDate'=>$date])}}">

        <p align="center">Транспортування на Луцьк (Київ) {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
    
        <table id="table3">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата/час</td>
                <td>№ карти виїзду</td>
                <td>ПІП хворого</td>
                <td>Звідки забрано</td>
                <td id="maxLenght" class="rotate">Куди доставлено</td>
                <td class="rotate">направлення</td>
                <td>Хто направляє</td>
                <td>Діагноз</td>
                <td>№ бр., керівник</td>
                <td>Примітки</td>
            </tr> 
            @foreach ($reports as $key=>$report)
            <tr>
                <td>
                    <div>{{$key+1}}</div>
                </td>
                <td>
                    <textarea name="date{{$key}}" rows="1" data="elastic">{{$report->timer}}</textarea>
                </td>
                <td>
                    <textarea name="no_card{{$key}}" rows="1" data="elastic">{{$report->no_card}}</textarea>
                </td>
                <td>
                    <textarea name="pib{{$key}}" rows="1" data="elastic">{{$report->pib}}</textarea>
                </td>
                <td>
                    <textarea name="at{{$key}}" rows="1" data="elastic">{{$report->at}}</textarea>
                </td>
                <td>
                    <textarea name="from{{$key}}" rows="1" data="elastic">{{$report->from}}</textarea>
                </td>
                <td>
                    <textarea name="direct{{$key}}" rows="1" data="elastic">{{$report->direct}}</textarea>
                </td>
                <td>
                    <textarea name="who_direct{{$key}}" rows="1" data="elastic">{{$report->who_direct}}</textarea>
                </td>
                <td>
                    <textarea name="diagnoz{{$key}}" rows="1" data="elastic">{{$report->diagnoz}}</textarea>
                </td>
                <td>
                    <textarea name="brig{{$key}}" rows="1" data="elastic">{{$report->brig}}</textarea>
                </td>
                <td>
                    <textarea name="other{{$key}}" rows="1" data="elastic">{{$report->other}}</textarea>
                </td>
            </tr>  
            @endforeach 
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>

        <div class="btn-group small-btn-group" onclick="AddLine3()" align="center">
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