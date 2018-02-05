@extends('layouts.shablon0')

@section('content')
<div id="features-wrapper">
<div id="features">
<div class="container">
<div class="row">
    <div class="2u 12u(mobile)">

        <!-- Feature #1 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'Report1'])}}" class="bordered-feature-image"><img src="{{asset('images/stat.png')}}" alt="" /></a>
            <p>
                Статистика
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'Report2'])}}" class="bordered-feature-image"><img src="{{asset('images/tolate.png')}}" alt="" /></a>
            <p>
                Інформація по запізненнях бригад на виклики
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
           <a href="{{action('FrontController@show', ['id'=>'Report3'])}}" class="bordered-feature-image"><img src="{{asset('images/transfer.png')}}" alt="" /></a>
            <p>
                Транспортування на Луцьк (Київ)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report4'])}}" class="bordered-feature-image"><img src="{{asset('images/gks.png')}}" alt="" /></a>
            <p>
                ГКС
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>                
            <a href="{{action('FrontController@show', ['id'=>'fatal'])}}" class="bordered-feature-image"><img src="{{asset('images/fatal.png')}}" alt="" /></a>
            <p>
                Смертність в присутності бригади (успішна реанімація)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report6'])}}" class="bordered-feature-image"><img src="{{asset('images/remark.png')}}" alt="" /></a>
            <p>
                Зауваження по роботі, скарги, подяки
            </p>
        </section>
    </div>
</div>
<div class="row">
    <div class="2u 12u(mobile)">

        <!-- Feature #1 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'dtp+ns'])}}" class="bordered-feature-image"><img src="{{asset('images/dtp_ns.png')}}" alt="" /></a>
            <p>
                ДТП
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'ns'])}}" class="bordered-feature-image"><img src="{{asset('images/all.png')}}" alt="" /></a>
            <p>
                «НС» (надзвичайні стани)
            </p>
        </section>
    </div> 
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'high_travmy'])}}" class="bordered-feature-image"><img src="{{asset('images/higch.png')}}" alt="" /></a>
            <p>
                Складні травми
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'tr_kytyzi'])}}" class="bordered-feature-image"><img src="{{asset('images/kytyzi.png')}}" alt="" /></a>
            <p>
                Травми китиці
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'opic'])}}" class="bordered-feature-image"><img src="{{asset('images/opic.png')}}" alt="" /></a>
            <p>
                Опіки/ Переохолодження
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'travmat'])}}" class="bordered-feature-image"><img src="{{asset('images/criminal.png')}}" alt="" /></a>
            <p>
                Травматизм (кримінальний, виробничий)
            </p>
        </section>
    </div>    
</div>


</div>

</div>
</div>

<script type="text/javascript">
    var el = document.getElementById('features-wrapper');
    el.parentNode.removeChild(el);
</script>

@endsection
