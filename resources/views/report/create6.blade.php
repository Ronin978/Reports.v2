@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>
    <form id="firstForm" method="POST" action="{{action('ReportController@store6')}}">

        <p align="center">Зауваження по роботі, скарги, подяки за <input id="firstdate" type="date" name="date" value="{{$date}}"></p>
    
        <table id="table6">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ картки</td>
                <td>Відділення</td>
                <td>Примітки</td>
            </tr> 
            <tr>
                <td>
                    1
                </td>
                <td>
                    <textarea name="date0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="subdiv0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="other0" rows="1"></textarea>
                </td>
                
            </tr>                           
                                
        </table>

        <button type="button" onclick="AddLine6()" >Додати стрічку</button>    
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <br>
        <input type="submit" value="Зберегти та продовжити">
    </form>        
</section>
<section>                
     <a href="{{action('FrontController@index', ['date'=>$date])}}">Завершити</a>

     <div class="gotoback" onclick="window.history.go(-1); return false;">
        <p>Назад</p>                        
    </div>
</section>

</div>
</div> 
</div>
</div>
</div>

@endsection