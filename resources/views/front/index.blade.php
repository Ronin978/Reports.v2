@extends('layouts.shablon1')

@section('content')
@include('flash::message')

<div id="templatemo_wrapper">
    
    <div id="templatmeo_menu">
    	<ul>
        	<li><a href="{{action('FrontController@show', ['id'=>'Report2'])}}" class="home"><span></span></a></li>
            <li><a href="{{action('FrontController@show', ['id'=>'Report3'])}}" class="about"><span></span></a></li>
            <li><a href="{{action('FrontController@show', ['id'=>'Report4'])}}" class="portfolio"><span></span></a></li>
            <li><a href="{{action('FrontController@show', ['id'=>'fatal'])}}" class="services"><span></span></a></li>
            <li><a href="{{action('FrontController@show', ['id'=>'Report6'])}}" class="contact"><span></span></a></li>
		</ul>
        <br>
        <hr>
        <ul>
            <li><a href="{{action('FrontController@show', ['id'=>'Report1'])}}" class="home"><span></span></a></li>
            <li><a href="#about" class="about"><span></span></a></li>
            <li><a href="#portfolio" class="portfolio"><span></span></a></li>
            <li><a href="#services" class="services"><span></span></a></li>
            <li><a href="#contact" class="contact"><span></span></a></li>
        </ul>
    </div>
    
    <div id="templatemo_main">
    	<div id="home" class="main_box">
        	<div class="col col_23">
            	<img src="images/templatemo_image_01.jpg" alt="image" class="img_frame" />
                <h5 align="center">РАПОРТ старших лікарів змін {{$table0->first()->chergovy}} <br>за чергування {{$date}}.</h5>

                    Екстр. - {{$table4[0]}}
                    <br>
                    Неекстр. - {{$table4[1]}}
                    
                        <table class="mytable">
                            <tr>
                                <td class="firstColumn"></td>
                                <td>День</td>
                                <td>Ніч</td>
                                <td>Всього</td>
                            </tr>                            
                            @foreach ($types as $key => $type)
                                <tr>
                                    <td class="firstColumn">
                                        {{$type}}
                                    </td>
                                    <td>
                                        {{ $table0[$key]->day }}
                                    </td>                                   
                                    <td>
                                        {{ $table0[$key]->night }}
                                    </td>
                                    <td>
                                        {{ $table0[$key]->day + $table0[$key]->night }}                               
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    
                        <table id="myTable" class="table mytable" >
                            <tr>
                            @for ($key=0; $key < count($sections); $key++)
                                
                                <td>{{$sections[$key]}}<br>
                                    {{$table1[$key]}}
                                </td>
                                @if ( ($key+1) % 7 == 0)
                                    </tr>
                                    <tr>
                                @endif
                            
                            @endfor
                            </tr>
                        </table>
                    
                        <table class="table mytable">
                            <tr>
                                @for($key=0; $key < count($gospit); $key++)
                                    <td>
                                        {{$gospit[$key]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                @for($i=0; $i < count($gospit); $i++)
                                    <td>
                                        {{$table2[$i]}}
                                    </td>
                                @endfor
                            </tr>
                        </table>

                        <p>Невідкладна допомога (ПМСД)   <span id="pmcd0">0</span> + <span id="pmcd1">0</span></p>
                        <table class="table mytable">
                            <tr>
                                @for ($key=0; $key < count($region); $key++)
                                    
                                    <td>{{$region[$key]}}<br>
                                        {{$table3[$key]}}
                                    </td>
                                    @if ( ($key+1) % 9 == 0)
                                        </tr>
                                        <tr>
                                    @endif
                                
                                @endfor
                            </tr>                         
                        </table>

                <div class="cleaner h40"></div>
                <h3>Our Service Lists</h3>
                <ul class="tmo_list">
                    <li>Nulla facilisi. Maecenas ac odio ipsum donec cursus</li>
                    <li>Fusce risus tortor, interdum in malesuada pulvinar</li>
                    <li>Proin facilisis ullamcorper turpis, in placerat</li>
                    <li>Sed vel justo quis ligula blandit commodo molestie</li>
                    <li>Ut tristique sagittis arcu, vel laoreet turpis</li>
                </ul>
			</div>
            <div class="col col_13 no_margin_right">
            	<h3>Швидкий пошук</h3>
                <blockquote>
                    <form method="GET" action="{{action('FrontController@QuickFind')}}">
                        <input type="date" name="date" >

                        <input type="submit" value="Знайти">
				    </form>
                </blockquote>
                

                <ul class="twitter_post">
                	<li>Suspendisse at scelerisque urna. Aenean tincidunt massa in tellus varius ultricies. <a href="#">http://bit.ly/13IwZO</a></li>
                    <li>Aliquam odio nibh, suscipit quis venenatis vitae, fringilla at quam. <a href="#">http://bit.ly/PPIwP</a></li>
                    <li>Proin tincidunt, arcu id pellentesque accumsan, neque dolor imperdiet ligula, quis viverra tellus nulla odio. <a href="#">http://bit.ly/I9IUY</a></li>
                </ul>
            </div>
            <div class="cleaner"></div>
            <a href="#templatemo_header" class="gototop">Go To Top</a>
            <div class="cleaner"></div>
		</div> <!-- END of home -->
        
            <div class="cleaner"></div>
            <a href="#templatemo_header" class="gototop">Go To Top</a>
            <div class="cleaner"></div>
		
    </div> <!-- END of -->
    
    <div id="templatemo_footer">
    	Copyright © 2048 Your Company Name<br /> Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    </div> 
</div> 

@endsection