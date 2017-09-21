@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>  
    <form id="firstForm" method="POST" action="{{action('ReportController@store5')}}">
   
        <p align="center"> {{"$title"."   $date"}}</p>
        <input type="hidden" name="pidtype" value="{{$pidtype}}">
        <input id="date" type="hidden" name="date" value="{{$date}}">
       
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
            <tr>
                <td>
                    <div>1</div>
                </td>
                <td>
                    <textarea name="date0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="title0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="adress0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="pib0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="other0" rows="1"></textarea>
                </td>
                
            </tr>                           
                                
        </table>

        <button type="button" onclick="AddLine5()" >Додати стрічку</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <br>
        <input type="submit" value="Save">
    </form>        
</section>

<section>            
    @if ($pidtype=='fatal')
        <a href="{{action('ReportController@create6', ['date'=>$date])}}">Next</a>
    @elseif($pidtype=='dtp+ns')
        <a href="{{action('ReportController@create7', ['date'=>$date])}}">Next</a>
    @elseif($pidtype=='high_travmy')
        <a href="{{action('ReportController@create8', ['date'=>$date])}}">Next</a>
    @elseif($pidtype=='tr_kytyzi')
        <a href="{{action('ReportController@create9', ['date'=>$date])}}">Next</a>
    @elseif($pidtype=='opic')
        <a href="{{action('ReportController@create10', ['date'=>$date])}}">Next</a>
    @elseif($pidtype=='travmat')
        <a href="{{action('ReportController@create11', ['date'=>$date])}}">Next</a>
    @endif

    <div class="gotoback" onclick="window.history.go(-1); return false;">
        <p>Back</p>                        
    </div>
</section>

</div>
</div> 
</div>
</div>
</div>              
    

@endsection