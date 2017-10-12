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
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script language="javascript">
    function CallPrint(strid) 
    { 
        var prtContent = document.getElementById(strid); 
        var WinPrint = window.open('', '',  'left=50,top=50,width=screen.availWidth, height=screen.availHeight,toolbar=0,scrollbars=1,status=0, onload=1'); 
        
        WinPrint.document.write('<html><head><title></title><link rel="stylesheet" type="text/css" href="{{asset("css/admin.css")}}"><link rel="stylesheet" type="text/css" href="{{asset("css/main.css")}}"><link rel="stylesheet" type="text/css" href="{{asset("css/app.css")}}"><script src="{{asset("js/jquery.min.js")}}"><\/script></head><body>'); 
        WinPrint.document.write(prtContent.innerHTML); 
        WinPrint.document.write("<script src='{{ asset('js/app.js') }}'><\/script><script src='{{asset('js/skel.min.js')}}'><\/script><script src='{{asset('js/skel-viewport.min.js')}}'><\/script><script src='{{asset('js/util.js')}}'><\/script><script src='{{asset('js/main.js')}}'><\/script><script src='{{asset('js/myFunction.js')}}'><\/script><script>window.onload=function(){ window.print(); window.close(); }<\/script></body></html>"); 

        WinPrint.document.close(); 
        WinPrint.focus(); 
      //  WinPrint.print(); 
      //  WinPrint.close();
         
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
                            <h1><a href="{{action('FrontController@index')}}">На головну</a></h1>
                        </div>
                            
                        
                        <!-- Nav -->
                            
                    <nav id="nav">
                                
                        
                        <div class="nav navbar-nav navbar-right">  

                            <a href="{{action('ReportController@create1')}}">Створити щоденний звіт</a>
                           

                           <!-- 
                           <a href="{{action('GroupController@index')}}">Керування групами</a>
                           -->
                            
                            @if (Auth::guest())
                                <a href="{{ route('login') }}">Вхід</a>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a> 
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Вийти
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

            

<!-- Content -->

 @yield('content')
                            

            <!-- Footer -->
                <div id="footer-wrapper">
                    <footer id="footer" class="container">
                        <div class="row">
                            <div class="8u 12u(mobile)">

                                <!-- Links -->
                                    <section>
                                        <h2>Links to Important Stuff</h2>
                                        <div>
                                            <div class="row">
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                            </div>
                            <div class="4u 12u(mobile)">

                                <!-- Blurb -->
                                    <section>
                                        <h2>An Informative Text Blurb</h2>
                                        <p>
                                            Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu
                                            varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi,
                                            dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh
                                            lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
                                        </p>
                                    </section>

                            </div>
                        </div>
                    </footer>
                </div>

            <!-- Copyright -->
                <div id="copyright">
                    &copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
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
        $('body').on('keyup', 'textarea[data^="'+data+'"]', function()
            { 
                if($(this).attr('data')==''+data+'')
                {
                    $(this).attr({style:'overflow:hidden;'+$(this).attr('style')+'',data:''+$(this).attr('data')+''+idNum+''});idNum++;
                } 
                tData = $(this).attr('data'); 
                if($('div[data="'+tData.replace(''+data+'','clone')+'"]').size()==0)
                { 
                    attr = 'style="display:none;padding:'+$(this).css('padding')+';width:'+$(this).css('width')+';min-height:'+$(this).css('height')+';font-size:'+$(this).css('font-size')+';line-height:'+$(this).css('line-height')+';font-family:'+$(this).css('font-family')+';white-space:'+$(this).css('white-space')+';word-wrap:'+$(this).css('word-wrap')+';letter-spacing:0.2px;" data="'+tData.replace(''+data+'','clone')+'"'; 
                    clone = '<div '+attr+'>'+$(this).val()+'</div>'; 
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
