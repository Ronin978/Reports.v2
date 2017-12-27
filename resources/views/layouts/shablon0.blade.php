<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    <script language="javascript">
    function CallPrint(strid) 
    { 
        var prtContent = document.getElementById(strid); 
        var WinPrint = window.open('', '', 'left=50,top=50,width=screen.availWidth, height=screen.availHeight,toolbar=0,scrollbars=1,status=0, onload=1'); 
        
        WinPrint.document.write('<html><head><title></title><link rel="stylesheet" type="text/css" href="{{asset("css/admin.css")}}"><link rel="stylesheet" type="text/css" href="{{asset("css/main.css")}}"><link rel="stylesheet" type="text/css" href="{{asset("css/app.css")}}"><script src="{{asset("js/jquery.min.js")}}"><\/script></head><body>'); 
        WinPrint.document.write(prtContent.innerHTML); 
        WinPrint.document.write("<script src='{{ asset('js/app.js') }}'><\/script><script src='{{asset('js/skel.min.js')}}'><\/script><script src='{{asset('js/skel-viewport.min.js')}}'><\/script><script src='{{asset('js/util.js')}}'><\/script><script src='{{asset('js/main.js')}}'><\/script><script src='{{asset('js/myFunction.js')}}'><\/script><script>window.onload=function(){ window.print(); window.close(); }<\/script></body></html>"); 

        WinPrint.document.close(); 
        WinPrint.focus(); 
      //  WinPrint.print(); 
      //  WinPrint.close();
         
    }
    </script>

    <script>
    window.onload=function(){
    var menuElem = document.getElementById('dropdown-menu1'),
        titleElem = menuElem.querySelector('.title');
        document.onclick = function(event) {
        var target = elem = event.target;
        while (target != this) {
              if (target == menuElem) {
              if(elem.tagName == 'DIV') {
                titleElem.innerHTML = elem.textContent;
                titleElem.style.backgroundImage =  getComputedStyle(elem, null)['backgroundImage']
              }
              menuElem.classList.toggle('open')
                  return;
              }
              target = target.parentNode;
          }
        menuElem.classList.remove('open');
    }
    }
    </script>
</head>

<body>
    <div id="page-wrapper">
    <!-- Header -->
        <div id="header-wrapper">
            <header id="header" class="container">
                <div class="row">
                    <div class="row 12u">
                        <!-- Logo -->
                        <div id="logo">
                            <h3><a href="{{action('FrontController@index')}}" onmouseover="myHover('home', 'ov');" onmouseout="myHover('home', 'out');"> <img id="home" class="ico" src="{{asset('css/ico/home.png')}}"> На головну</a></h3>
                        </div>
                        <!-- Nav -->
                    <nav id="nav">
                        <div class="nav navbar-nav navbar-right"> 
                           <!-- 
                           <a href="{{action('GroupController@index')}}">Керування групами</a>
                           -->
                            @if (Auth::guest())
                                <a href="{{ route('login') }}" onmouseover="myHover('login', 'ov');" onmouseout="myHover('login', 'out');"><img id="login" class="ico" src="{{asset('css/ico/login.png')}}">&nbsp Вхід</a>
                            @else
                                <a id="createForm" onmouseover="myHover('cardio', 'ov');" onmouseout="myHover('cardio', 'out');"><img id="cardio" class="ico" src="{{asset('css/ico/cardio.png')}}"> Створити звіт <select id="mySelect1" 
onchange="location.href = window.location.protocol+'//'+window.location.host+'/report/create/'+this.options[this.selectedIndex].value+'?date={{date('Y-m-d')}}';">
                                    <option selected>Виберіть тип звіту</option>
<?php include "table.php" ?></select></a>

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onmouseover="myHover('user', 'ov');" onmouseout="myHover('user', 'out');">
                                <img id="user" src="{{asset('css/ico/user.png')}}" class="ico"> {{ Auth::user()->name }} <span class="caret"></span>
                                </a> 
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" onmouseover="myHover('logout', 'ov');" onmouseout="myHover('logout', 'out');">
                                            <img id="logout" class="ico" src="{{asset('css/ico/logout.png')}}"> &nbsp&nbsp Вийти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </nav>
                    </div>
                </div>
            </header>
        </div>

<div id="features-wrapper">
<div id="features">
<div class="container">
<div id="dropdown-menu1" class="dropdown-menu1">

<div class="row">
            <a id="mypanel" href="#"><img id="panel" class="ico" src="{{asset('css/ico/panel.png')}}">&nbsp Панель
            </a>
</div>
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
                ДТП і «НС» (надзвичайні стани)
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
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'allReports'])}}" class="bordered-feature-image"><img src="{{asset('images/all.png')}}" alt="" /></a>
            <p>
                Повний рапорт старших лікарів
            </p>
        </section>
    </div>    
</div>

</div>
</div>
</div>
</div>
            

<!-- Content -->

 @yield('content')
                            

<!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            <div class="row">
                <div class="8u 12u(mobile)">

                    <!-- Links -->
                        <section>
                            <h2>Інші сайти компанії</h2>
                            <div>
                                <div class="row">
                                    <div class="5u 12u(mobile)">
                                        <ul class="link-list last-child">
                                            <li><a href="http://103.volyn.ua/">Офіційний сайт КЗ "ВОЦЕМДМК"</a></li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class="3u 12u(mobile)">
                                        <ul class="link-list last-child">
                                            <li><a href="https://www.facebook.com/emdvolyn/">Facebook</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                </div>
                <div class="4u 12u(mobile)">

                    <!-- Blurb -->
                        <section>
                            <h2>Сайт знаходиться в тестовому режимі.</h2>
                            <p>
                                Про всі помилки повідомляти розробника. Для ефективного усунення несправностей зробити скріншот та описати які дії призвели до несправності.
                            </p>
                        </section>

                </div>
            </div>
        </footer>
    </div>

<!-- Copyright -->
    <div id="copyright">
        &copy;Власник КЗ"ВОЦЕМДМК". Всі права захищені. | Шаблон сайту: <a href="http://html5up.net">html5up</a>
    </div>

</div>

    <!-- Scripts -->
    
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
     
    <script src="{{asset('js/skel.min.js')}}"></script>
    <script src="{{asset('js/skel-viewport.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/myFunction.js')}}"></script>
    <script type="text/javascript">
        var idNum = 0, data = 'elastic'; 
        $('table').on('keyup', 'textarea[data^="'+data+'"]', function()
            { 
                if($(this).attr('data')==''+data+'')
                {
                    $(this).attr({style:'overflow:hidden;'+$(this).attr('style')+'',data:''+$(this).attr('data')+''+idNum+''});

                } 
                var tData = $(this).attr('data'); 
                if($('div[data="'+tData.replace(''+data+'','clone')+'"]').size()==0)
                { 
                    var attr = 'style="display:none;padding:'+$(this).css('padding')+';width:'+$(this).css('width')+';min-height:'+$(this).css('height')+';font-size:'+$(this).css('font-size')+';line-height:'+$(this).css('line-height')+';white-space:'+$(this).css('white-space')+';word-wrap:'+$(this).css('word-wrap')+';letter-spacing:0.2px;" data="'+tData.replace(''+data+'','clone')+'"'; 
                    var clone = '<div '+attr+'>'+$(this).val()+'</div>'; 
                    $('body').prepend(clone); 
                    idNum++; 
                }
                else
                { 
                    $('div[data="'+tData.replace(''+data+'','clone')+'"]').html($(this).val()); 
                    $(this).css('height',''+$('div[data="'+tData.replace(''+data+'','clone')+'"]').css('height')+''); 
                } 
            });
    </script>
    

</body>
</html>
