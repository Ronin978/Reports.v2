@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
 	<section >  
		<form method="POST" action="{{action('GroupController@store')}}">

			Назва таблиці<br>
			(1) call <br>
			(2) gosp <br>
			(3) region <br> 
			(4) sections <br>
			<input type="text" name="group"> <br><hr>
			Назви ланок таблиці: <br> 
			<textarea name="title"></textarea> 
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<hr>
			(1) Прийнято викликів;Передано на невідкладну допомогу;Поради (заг. к-сть);Передано іншим відділенням;Виконано виїздів <br>
			(2) Доставлено на госпіталізацію;Госпіталізовано;Не госпіталізовано;Відмова від госпіталізації;ЕКГ (заг. к-сть) <br>
			(3) м. Луцьк;Дит.нев.;Луц-ий р-н;Рож-ий р-н;Тур-ий р-н;Горх-ий р-н.;Локач-ий р-н;В.Вол-ий р-н.;Іван-ий. р-н;ККаш-ий р-н;Ків-ий р-н;Ков-ий р-н.;Любеш. р-н;Люб-мль. р-н;Шац-ий р-н;Ман-ий р-н.;Рат-ий р-н.;Стар-ий р-н;Нов-ий р-н;Інше <br>
			(4) Липини,10;Рівненська,8;Волі,2;Бендел.,1;Словацьк.,6;Турійськ;Рожище,1;Горохів,1; Липини,12;Рівненська,9;Волі,3;Бендел.,4;Словацьк.,7;Луків;Рожище,2;Горохів,2; Липини,14;16(Торчин);Волі,5;Бендел.,11;Словацьк.,15;Купичів;Доросині;Берестечко;ОШБ;Локачі <br>


			<input type="submit" value="Зберегти">
			
		</form>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection