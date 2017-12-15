@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>
    <form id="firstForm" method="POST" action="{{action('ReportController@update', ['table'=>'Report2', 'newDate'=>$date])}}">
        
        <p align="center">Інформація по запізненнях бригад на виклики за {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
        <table id="table2">
            <tr>
                <td class="col_3">№<br>п/п</td>
                <td class="col_15">Відділення / пункт що має обслуговувати</td>
                <td class="col_8">№ виїзної карти /е(н)</td>
                <td class="col_15">Адреса виклику (район)</td>
                <td class="col_10">№ Бригада що обслуговувала</td>
                <td class="col_15">Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                <td class="col_5 rotate45">постдиспетч<br> підтримка</td>
                <td class="col_10">Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
            </tr>
            @foreach ($reports as $key=>$report)
            <tr>
                <td>
                    <DIV>{{$key+1}}</DIV>
                </td>
                <td>
                    <input size="14" list="myList" name="punkt{{$key}}" value="{{$report->punkt}}">
                        <datalist id="myList">
                            <?php include 'viddil.php' ?>
                        </datalist>
                </td>
                <td>
                    <textarea name="no_card{{$key}}" rows="1" data="elastic">{{$report->no_card}}</textarea>
                </td>
                <td>
                    <textarea name="adress{{$key}}" rows="1" data="elastic">{{$report->adress}}</textarea>
                </td>
                <td>
                    <textarea name="brig{{$key}}" rows="1" data="elastic">{{$report->brig}}</textarea>
                </td>
                <td>
                    <textarea name="time{{$key}}" rows="1" data="elastic">{{$report->time}}</textarea>
                </td>
                <td>
                    <textarea name="support{{$key}}" rows="1" data="elastic">{{$report->support}}</textarea>
                </td>
                <td>
                    <textarea name="cause{{$key}}" rows="1" data="elastic">{{$report->cause}}</textarea>
                </td>
                <td>
                    <textarea name="call{{$key}}" rows="1" data="elastic">{{$report->call}}</textarea>
                </td>
            </tr>                           
            @endforeach                    
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/> 
        
        <div class="btn-group small-btn-group" onclick="AddLine2()" align="center">
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