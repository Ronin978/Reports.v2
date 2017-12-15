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
            <tr id="firstTr" style="height: 200px;">
                <td class="col_3">№<br>п/п</td>
                <td class="col_8">Дата,час</td>
                <td class="col_8">№ карти виїзду</td>
                <td class="col_8">Адреса виклику</td>
                <td>Відділення</td>
                <td class="col_8">ПІП хворого</td>
                <td class="col_5">Вік</td>
                <td >Діагноз</td>
                <td class="col_15">№ бр.,<br> керівник</td>
                <td class="col_3 rotate">Тромболізис</td>
                <td class="col_3 rotate">Стентування</td>
                <td class="col_10 maxLenght"><small>Госпіталізація(лікувальний заклад)/година</small></td>
                <td class="col_5 rotate_two"><small>Зв’язок&nbspз&nbspлікарем<br> консультантом</small>
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
                    <input size="10" list="myList" name="viddil{{$key}}" value="{{$report->viddil}}">
                        <datalist id="myList">
                            <?php include 'viddil.php' ?>
                        </datalist>
                       
                        <!--active {{$report->viddil}}-->
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