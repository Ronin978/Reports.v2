@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>  
    <form id="firstForm" method="POST" action="{{action('ReportController@update', ['table'=>'Report4', 'newDate'=>$date])}}">
   
        <p align="center">ГКС {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
        <table id="table4">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ карти виїзду</td>
                <td>Адреса виклику</td>
                <td>ПІП хворого</td>
                <td>Вік</td>
                <td>Діагноз</td>
                <td>№ бр.,<br> керівник</td>
                <td class="rotate">Тромболізис</td>
                <td class="rotate">Стентування</td>
                <td id="maxLenght" class="rotate">Госпіталізація<br>(лікувальний заклад)/година</td>
                <td class="rotate">Зв’язок з лікарем консультантом
                </td>
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
                    <textarea name="adress{{$key}}" rows="1" data="elastic">{{$report->adress}}</textarea>
                </td>
                <td>
                    <textarea name="pib{{$key}}" rows="1" data="elastic">{{$report->pib}}</textarea>
                </td>
                <td>
                    <textarea name="age{{$key}}" rows="1" data="elastic">{{$report->age}}</textarea>
                </td>
                <td>
                    <textarea name="diagnoz{{$key}}" rows="1" data="elastic">{{$report->diagnoz}}</textarea>
                </td>
                <td>
                    <textarea name="brig{{$key}}" rows="1" data="elastic">{{$report->brig}}</textarea>
                </td>
                <td>
                    <textarea name="tromb{{$key}}" rows="1" data="elastic">{{$report->tromb}}</textarea>
                </td>
                <td>
                   <textarea name="stent{{$key}}" rows="1" data="elastic">{{$report->stent}}</textarea>
                </td>
                <td>
                   <textarea name="gospital{{$key}}" rows="1" data="elastic">{{$report->gospital}}</textarea>
                </td>
                <td>
                    <textarea name="support{{$key}}" rows="1" data="elastic">{{$report->support}}</textarea>
                </td>
            </tr>                           
            @endforeach                      
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>
        
        <div class="btn-group small-btn-group" onclick="AddLine4()" align="center">
            <span>
                <img src="{{asset('css/ico/add.png')}}">
                Додати рядок   
            </span>
        </div><br>
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