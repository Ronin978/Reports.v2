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
                    <textarea name="date{{$key}}" rows="1">{{$report->timer}}</textarea>
                </td>
                <td>
                    <textarea name="no_card{{$key}}" rows="1">{{$report->no_card}}</textarea>
                </td>
                <td>
                    <textarea name="adress{{$key}}" rows="1">{{$report->adress}}</textarea>
                </td>
                <td>
                    <textarea name="pib{{$key}}" rows="1">{{$report->pib}}</textarea>
                </td>
                <td>
                    <textarea name="age{{$key}}" rows="1">{{$report->age}}</textarea>
                </td>
                <td>
                    <textarea name="diagnoz{{$key}}" rows="1">{{$report->diagnoz}}</textarea>
                </td>
                <td>
                    <textarea name="brig{{$key}}" rows="1">{{$report->brig}}</textarea>
                </td>
                <td>
                    <textarea name="tromb{{$key}}" rows="1">{{$report->tromb}}</textarea>
                </td>
                <td>
                   <textarea name="stent{{$key}}" rows="1">{{$report->stent}}</textarea>
                </td>
                <td>
                   <textarea name="gospital{{$key}}" rows="1">{{$report->gospital}}</textarea>
                </td>
                <td>
                    <textarea name="support{{$key}}" rows="1">{{$report->support}}</textarea>
                </td>

            </tr>                           
            @endforeach                      
        </table>

        <button type="button" onclick="AddLine4()" >Додати стрічку</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>
        <br>
        <input type="submit" value="Зберегти">    
    </form>
</section>

</div>
</div> 
</div>
</div>
</div>

@endsection