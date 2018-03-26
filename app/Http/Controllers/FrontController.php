<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report1;
use App\Info;
use App\Group;
use App\Report2;
use App\Report3;
use App\Report4;
use App\Report5;
use App\Report6;
use App\Viddil;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Info::where('id_group', '1')->first())
        {
            $maxDate = Info::max('date');
            $tables = ['fatal', 'dtp+ns', 'ns', 'high_travmy', 'tr_kytyzi', 'opic', 'travmat'];

            $datell = explode('-', $maxDate);
            $dateD = "$datell[2]-$datell[1]-$datell[0]";

             $reports1 = Report1::where('date', $maxDate)->get();
                
                if (!empty($reports1->first())) 
                {
                    $types = Group::where('group', 'call')->get()->first();
                    $typ = explode(";", $types->title);

                    $sections = Group::where('group', 'sections')->get()->first();
                    $sect = explode(";", $sections->title);

                    $gospit = Group::where('group', 'gosp')->get()->first();
                    $gosp = explode(";", $gospit->title);

                    $region = Group::where('group', 'region')->get()->first();
                    $reg = explode(";", $region->title);
                   
                    for ($i=1; $i <= 4; $i++)
                    {
                        $info[$i] = Info::where('id_group', $i)->where('date', $maxDate)->first();                    
                        $inf[$i] = explode(";", $info[$i]->value);
                    }
                }                
        //end Report1
        //Report2
                $reports2 = Report2::where('date', $maxDate)->orderBy('punkt')->get();
        //Report3
                $reports3 = Report3::where('date', $maxDate)->orderBy('viddil')->get();
        //Report4
                $reports4 = Report4::where('date', $maxDate)->orderBy('viddil')->get();
        //Report5
                foreach ($tables as $key => $tab) 
                {
                    $reports5[$key] = Report5::where('date', $maxDate)->where('pidtype', $tab)->orderBy('viddil')->get();
                }                
        //end Report5
        //Report6
                $reports6 = Report6::where('date', $maxDate)->orderBy('subdiv')->get();
                return view('front.index', ['date'=>$dateD, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'inf'=>$inf, 'reports1'=>$reports1, 'reports2'=>$reports2, 'reports3'=>$reports3, 'reports4'=>$reports4, 'reports5'=>$reports5, 'reports6'=>$reports6]);
        }
        else
        {
            return view('front.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) 
        {
            case 'Report1':
                $obj=Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'Статистика';
                break;
            case 'Report2':
                $obj=Report2::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'Інформація по запізненнях бригад на виклики';
                break;
            case 'Report3':
                $obj=Report3::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'Транспортування на Луцьк (Київ)';
                break;
            case 'Report4':
                $obj=Report4::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'ГКС';
                break;
            case 'Report6':
                $obj=Report6::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'Зауваження по роботі, скарги, подяки';
                break;
            case 'allReports': 
                $obj = Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'Рапорт старших лікарів';
                break;
    //Report5 - fatal, dtp+ns, high_travmy, tr_kytyzi, opic, travmat
            case 'fatal':
            case 'dtp+ns':
            case 'ns':
            case 'high_travmy':
            case 'tr_kytyzi':
            case 'opic':
            case 'travmat':
                $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                switch ($id)
                {
                    case 'fatal':
                        $title = 'Смертність в присутності бригади (успішна реанімація)';
                        break;
                    case 'dtp+ns':
                        $title = 'ДТП';
                        break;
                    case 'ns':
                        $title = '«НС» (надзвичайні стани)';
                        break;
                    case 'high_travmy':
                        $title = 'Складні травми';
                        break;
                    case 'tr_kytyzi':
                        $title = 'Травми китиці';
                        break;
                    case 'opic':
                        $title = 'Опіки/ Переохолодження';
                        break;
                    case 'travmat':
                        $title = 'Травматизм (кримінальний, виробничий)';
                        break;
                    default:
                        $obj=array();
                        $title = 'Таких даних не існує';
                        break;
                }
                break;
        }
        return view('front.show', ['ojects'=>$obj, 'title'=>$title, 'table'=>$id]);
    }

    public function myShow($date, $table)
    {
        $datell = explode('-', $date);
        $dateD = "$datell[2]-$datell[1]-$datell[0]";
        $tables = ['fatal', 'dtp+ns', 'ns', 'high_travmy', 'tr_kytyzi', 'opic', 'travmat'];
        switch ($table) 
        {
            case 'Report1':
                //Заголовки
                $types = Group::where('group', 'call')->get()->first();
                $typ = explode(";", $types->title);

                $sections = Group::where('group', 'sections')->get()->first();
                $sect = explode(";", $sections->title);

                $gospit = Group::where('group', 'gosp')->get()->first();
                $gosp = explode(";", $gospit->title);

                $region = Group::where('group', 'region')->get()->first();
                $reg = explode(";", $region->title);
                //Заголовки END
                //Date Table
                $reports = Report1::where('date', $date)->get();
                if (empty($reports->first())) 
                {
                    flash('Це остання таблиця звіту з вказаною датою.1');
                    return back();
                }
                else
                {    
                    for ($i=1; $i <= 4; $i++)
                    {
                        $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();
                        $inf[$i] = explode(";", $info[$i]->value);
                    }
                 
                    return view('report.myShow1', ['date'=>$dateD, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'reports'=>$reports, 'inf'=>$inf]);
                }
                break;
            case 'Report2':
                $reports = Report2::where('date', $date)->orderBy('punkt')->get();
                if (!empty($reports->first()))
                {
                    return view('report.myShow2', ['reports'=>$reports, 'date'=>$dateD]);
                    break;
                }
                else
                {
                    return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>'Report3']);        
                }
                break;
            case 'Report3':
                $reports = Report3::where('date', $date)->orderBy('viddil')->get();
                if (!empty($reports->first())) 
                {
                    return view('report.myShow3', ['reports'=>$reports, 'date'=>$dateD]);
                }
                else
                {
                    return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>'Report4']);
                }
                break;
            case 'Report4':
                $reports = Report4::where('date', $date)->orderBy('viddil')->get();
                if (!empty($reports->first()))  
                {
                    return view('report.myShow4', ['reports'=>$reports, 'date'=>$dateD]);
                }
                else
                {                          
                    return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>'fatal']);
                }
                break;
            case 'fatal':
            case 'dtp+ns':
            case 'ns':
            case 'high_travmy':
            case 'tr_kytyzi':
            case 'opic':
            case 'travmat':
                foreach ($tables as $j => $tab) 
                {
                    if ($table == $tab) 
                        { $exp = $j; }
                }
                for ($i=$exp; $i < count($tables); $i++) 
                {
                    $reports = Report5::where('date', $date)->where('pidtype', $tables[$i])->orderBy('viddil')->get();
                    if (!empty($reports->first()))
                    {
                        return view('report.myShow5', ['date'=>$dateD, 'reports'=>$reports, 'table'=>$tables[$i]]);
                        break;
                    } 
                    elseif ((empty($reports->first()))&&($i == count($tables)-1)) //якщо елемент останній та порожній
                    {
                        return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>$tables[$i+1]]);
                        break;
                    } 
                    else
                    {
                        return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>'Report6']);
                        break;
                    }                   
                }                    
                break;
            case 'Report6':
                $reports = Report6::where('date', $date)->orderBy('subdiv')->get();
                if (!empty($reports->first())) 
                {
                    return view('report.myShow6', ['reports'=>$reports, 'date'=>$dateD]);
                } 
                else
                {
                    flash('Це остання таблиця звіту з заданою датою.');
                    return back();
                }
                break;
            case 'allReports':
        //Report1                
                $reports1 = Report1::where('date', $date)->get();
                
                if (!empty($reports1->first())) 
                {
                    $types = Group::where('group', 'call')->get()->first();
                    $typ = explode(";", $types->title);

                    $sections = Group::where('group', 'sections')->get()->first();
                    $sect = explode(";", $sections->title);

                    $gospit = Group::where('group', 'gosp')->get()->first();
                    $gosp = explode(";", $gospit->title);

                    $region = Group::where('group', 'region')->get()->first();
                    $reg = explode(";", $region->title);
                   
                    for ($i=1; $i <= 4; $i++)
                    {
                        $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();                    
                        $inf[$i] = explode(";", $info[$i]->value);
                    }
                }                
        //end Report1
        //Report2
                $reports2 = Report2::where('date', $date)->orderBy('punkt')->get();
        //Report3
                $reports3 = Report3::where('date', $date)->orderBy('viddil')->get();
        //Report4
                $reports4 = Report4::where('date', $date)->orderBy('viddil')->get();
        //Report5
                foreach ($tables as $key => $tab) 
                {
                    $reports5[$key] = Report5::where('date', $date)->where('pidtype', $tab)->orderBy('viddil')->get();
                }                
        //end Report5
        //Report6
                $reports6 = Report6::where('date', $date)->orderBy('subdiv')->get();
                return view('report.reportsForm', ['date'=>$dateD, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'inf'=>$inf, 'reports1'=>$reports1, 'reports2'=>$reports2, 'reports3'=>$reports3, 'reports4'=>$reports4, 'reports5'=>$reports5, 'reports6'=>$reports6]);
                break;
        }
    }

    public function DateFind(Request $request)
    {
        $date = ($request->all())['date'];

        if ((Report1::where('date', $date)->first()) !== null) 
        {
    //Titles
            $types = Group::where('group', 'call')->get()->first();
            $typ = explode(";", $types->title);

            $sections = Group::where('group', 'sections')->get()->first();
            $sect = explode(";", $sections->title);

            $gospit = Group::where('group', 'gosp')->get()->first();
            $gosp = explode(";", $gospit->title);

            $region = Group::where('group', 'region')->get()->first();
            $reg = explode(";", $region->title);
    //end Titles
    //Report1        
            $reports1 = Report1::where('date', $date)->get();
            for ($i=1; $i <= 4; $i++)
            {
                if (Info::where('id_group', $i)->where('date', $date)->first()) 
                {
                    $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();
                    $inf[$i] = explode(";", $info[$i]->value);
                }
                else 
                { $inf[$i] = 0; }
            }
    //end Report1
            $reports2 = Report2::where('date', $date)->orderBy('punkt')->get();//Report2
            $reports3 = Report3::where('date', $date)->orderBy('viddil')->get();//Report3
            $reports4 = Report4::where('date', $date)->orderBy('viddil')->get();//Report4
    //Report5
            $tables = ['fatal', 'dtp+ns', 'ns', 'high_travmy', 'tr_kytyzi', 'opic', 'travmat'];
            foreach ($tables as $key => $table) 
            {
                $reports5[$key] = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
            }
    //end Report5
            $reports6 = Report6::where('date', $date)->orderBy('subdiv')->get();//Report11
           // dd( ($inf[4]));
            return view('report.reportsForm', ['date'=>$date, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'inf'=>$inf, 'reports1'=>$reports1, 'reports2'=>$reports2, 'reports3'=>$reports3, 'reports4'=>$reports4, 'reports5'=>$reports5, 'reports6'=>$reports6]);
        }
        else
        {            
            return view('front.error', ['title'=>"Вказана дата $date відсутня у списку рапортів."]);
        }
    }

    public function QuickFind(Request $request)
    {
        $post = $request->all();
        
        $dateStart = $post['dateStart'];
        $dateEnd = $post['dateEnd'];
        $table = $post['table'];
        $viddil = $post['viddil'];
        $date = "$dateStart --- $dateEnd";

        $title = 'Звіту з вказаними параметрами не існує.';

        $date1 = date_create($dateEnd);
        $date2 = date_create($dateStart);
        $dateCount = date_diff($date1, $date2)->days;        

        switch ($table) 
        {
            case 'Report1':
                //Заголовки
                $types = Group::where('group', 'call')->get()->first();
                $typ = explode(";", $types->title);

                $sections = Group::where('group', 'sections')->get()->first();
                $sect = explode(";", $sections->title);

                $gospit = Group::where('group', 'gosp')->get()->first();
                $gosp = explode(";", $gospit->title);

                $region = Group::where('group', 'region')->get()->first();
                $reg = explode(";", $region->title);
                //Заголовки END
                //Data Table
                $repDate = Report1::select('date')->where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->distinct('date')->get(); 
                
                for ($type=0; $type < 5; $type++)  
                {
                    //$dateArray[] = $rd->date;
                    $allDay = 0;
                    $allNight = 0;
                    foreach ($repDate as $key => $rd)
                    { 
                        $iter = Report1::where('date', $rd->date)->where('type', $type)->first();
                        $allDay += $iter->day;
                        $allNight += $iter->night;
                    }
                    $allReport['day'][$type] = $allDay;
                    $allReport['night'][$type] = $allNight;
                }
                foreach ($repDate as $key => $rd)
                {                    
                    for ($i=1; $i <= 4; $i++)
                    {  
                        $info = Info::where('id_group', $i)->where('date', $rd->date)->first()->value;
                        $var1 = explode(";", $info);
                        foreach ($var1 as $key1 => $val) 
                        {
                            if (!empty($array[$i][$key1])) 
                            {
                                $array[$i][$key1] += intval($val);
                            }
                            else
                            {
                                $array[$i][$key1] = intval($val);
                            }
                        } 
                    }
                }
                //dd($array);
                return view('report.arrayReport.showAll1', ['date'=>$date, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'inf'=>$array, 'allReport'=>$allReport]);
                break;
            case 'Report2':
                if (empty($viddil)||$viddil=='Всі відділення') 
                {
                    $reports = Report2::where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('punkt')->get();
                }
                else
                {
                    $reports = Report2::where('punkt', $viddil)->where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('punkt')->get();
                } 
                if (empty($reports->first()))
                {
                    return view('front.error', ['title'=>$title]);
                    break;
                }
                return view('report.myShow2', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);
                break;
            case 'Report3':
                if (empty($viddil)||$viddil=='Всі відділення') 
                {
                    $reports = Report3::where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('viddil')->get();
                }
                else
                {
                    $reports = Report3::where('viddil', $viddil)->where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('viddil')->get();
                } 
                if (empty($reports->first()))
                {
                    return view('front.error', ['title'=>$title]);
                    break;
                }
                return view('report.myShow3', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);  
                break;
            case 'Report4':
                if (empty($viddil)||$viddil=='Всі відділення') 
                {
                    $reports = Report4::where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('viddil')->get();
                }
                else
                {
                    $reports = Report4::where('viddil', $viddil)->where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('viddil')->get();
                } 
                if (empty($reports->first()))
                {
                    return view('front.error', ['title'=>$title]);
                    break;
                }
                return view('report.myShow4', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);  
                break;
            case 'Report6':
                if (empty($viddil)||$viddil=='Всі відділення') 
                {
                    $reports = Report6::where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('subdiv')->get();
                }
                else
                {
                    $reports = Report6::where('subdiv', $viddil)->where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->orderBy('subdiv')->get();
                } 
                if (empty($reports->first()))
                {
                    return view('front.error', ['title'=>$title]);
                    break;
                }
                return view('report.myShow6', ['reports'=>$reports, 'date'=>$date, 'indicator'=>'1']);
                break;
            case 'fatal'||'dtp+ns'||'ns'||'high_travmy'||'tr_kytyzi'||'opic'||'travmat':
                $reports = Report5::where('date', '>=', $dateStart)->where('date', '<=', $dateEnd)->where('pidtype', $table)->orderBy('viddil')->get();
                return view('report.myShow5', ['reports'=>$reports, 'date'=>$date, 'indicator'=>'1', 'table'=>$table]);
                break;
        }
    }
    
    public function edit($table, $date)
    {
    switch ($table) 
        {
            case 'allReports':
                $title = 'Редагуйте таблиці по одній, в головному меню.';
                return view('front.error', ['title'=>$title]);
                break;
            case 'Report1':
    //Заголовки
                $types = Group::where('group', 'call')->get()->first();
                $typ = explode(";", $types->title);

                $sections = Group::where('group', 'sections')->get()->first();
                $sect = explode(";", $sections->title);

                $gospit = Group::where('group', 'gosp')->get()->first();
                $gosp = explode(";", $gospit->title);

                $region = Group::where('group', 'region')->get()->first();
                $reg = explode(";", $region->title);
    //Заголовки END
    //Date Table
                $reports = Report1::where('date', $date)->get();
                for ($i=1; $i <= 4; $i++)
                {
                    $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();
                    $inf[$i] = explode(";", $info[$i]->value);
                }
                return view('report.edit1', ['date'=>$date, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'reports'=>$reports, 'inf'=>$inf]);
                break;
            case 'Report2':
                $reports = Report2::where('date', $date)->orderBy('punkt')->get();
                return view('report.edit2', ['date'=>$date, 'reports'=>$reports]);
                break;
            case 'Report3':
                $reports = Report3::where('date', $date)->orderBy('viddil')->get();
                return view('report.edit3', ['date'=>$date, 'reports'=>$reports]);
                break;
            case 'Report4':
                $reports = Report4::where('date', $date)->orderBy('viddil')->get();
                return view('report.edit4', ['date'=>$date, 'reports'=>$reports]);
                break;
            case 'Report6':
                $reports = Report6::where('date', $date)->orderBy('subdiv')->get();
                return view('report.edit6', ['date'=>$date, 'reports'=>$reports]);
                break;
    //Report5 - fatal, dtp+ns, 'ns', high_travmy, tr_kytyzi, opic, travmat
            default:
                switch ($table) 
                {
                    case 'fatal':
                        $title = 'Смертність в присутності бригади (успішна реанімація)';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;
                    case 'dtp+ns':
                        $title = 'ДТП';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;
                    case 'ns':
                        $title = '«НС» (надзвичайні стани)';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;
                    case 'high_travmy':
                        $title = 'Складні травми';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;
                    case 'tr_kytyzi':
                        $title = 'Травми китиці';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;
                    case 'opic':
                        $title = 'Опіки/ Переохолодження';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;
                    case 'travmat':
                        $title = 'Травматизм (кримінальний, виробничий)';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->orderBy('viddil')->get();
                        break;                    
                    default:
                        $title = 'Неможливо відобразити дані для редагування. Спробуйте редагувати таблиці по одній.';
                        break;
                }
                return view('report.edit5', ['date'=>$date, 'table'=>$table, 'title'=>$title, 'reports'=>$reports]);
                break;
        }
    }

    public function sort($table)
    {
        switch ($table) 
        {
            case 'Report1':
                $obj=Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'Статистика';
                break;
            case 'Report2':
                $obj=Report2::select('punkt')->orderBy('punkt')->distinct('punkt')->paginate(10);//список всіх відділів
                
                foreach ($obj as $key => $val) 
                {     
                    $maxDate=Report2::select('date')->where('punkt', $val->punkt)->max('date');
                    $minDate=Report2::select('date')->where('punkt', $val->punkt)->min('date');
                    $val->date = "$minDate---$maxDate";
                }

                $title = 'Інформація по запізненнях бригад на виклики';
                break;
            case 'Report3':
               $obj=Report3::select('viddil')->orderBy('viddil')->distinct('viddil')->paginate(10);//список всіх відділів
                
                foreach ($obj as $key => $val) 
                {     
                    $maxDate=Report3::select('date')->where('viddil', $val->viddil)->max('date');
                    $minDate=Report3::select('date')->where('viddil', $val->viddil)->min('date');

                    $val->date = "$minDate---$maxDate";
                }
                
                $title = 'Транспортування';
                break;
            case 'Report4':
                $obj=Report4::select('viddil')->orderBy('viddil')->distinct('viddil')->paginate(10);//список всіх відділів
                
                foreach ($obj as $key => $val) 
                {     
                    $maxDate=Report4::select('date')->where('viddil', $val->viddil)->max('date');
                    $minDate=Report4::select('date')->where('viddil', $val->viddil)->min('date');

                    $val->date = "$minDate---$maxDate";
                }
                
                $title = 'ГКС';
                break;
            case 'Report6':
                $obj=Report6::select('subdiv')->orderBy('subdiv')->distinct('subdiv')->paginate(10);//список всіх відділів
                
                foreach ($obj as $key => $val) 
                {     
                    $maxDate=Report6::select('date')->where('subdiv', $val->subdiv)->max('date');
                    $minDate=Report6::select('date')->where('subdiv', $val->subdiv)->min('date');

                    $val->date = "$minDate---$maxDate";
                }
                $title = 'Зауваження по роботі, скарги, подяки';
                break;

    //Report5 - fatal, dtp+ns, 'ns', high_travmy, tr_kytyzi, opic, travmat
            case 'fatal':
            case 'dtp+ns':
            case 'ns':
            case 'high_travmy':
            case 'tr_kytyzi':
            case 'opic':
            case 'travmat':
                $obj=Report5::select('viddil')->orderBy('viddil')->distinct('viddil')->paginate(10);//список всіх відділів
                
                foreach ($obj as $key => $val) 
                {     
                    $maxDate=Report5::select('date')->where('viddil', $val->viddil)->max('date');
                    $minDate=Report5::select('date')->where('viddil', $val->viddil)->min('date');

                    $val->date = "$minDate---$maxDate";
                }

                switch ($table)
                {
                    case 'fatal':
                        $title = 'Смертність в присутності бригади (успішна реанімація)';
                        break;
                    case 'dtp+ns':
                        $title = 'ДТП';
                        break;
                    case 'ns':
                        $title = '«НС» (надзвичайні стани)';
                        break;
                    case 'high_travmy':
                        $title = 'Складні травми';
                        break;
                    case 'tr_kytyzi':
                        $title = 'Травми китиці';
                        break;
                    case 'opic':
                        $title = 'Опіки/ Переохолодження';
                        break;
                    case 'travmat':
                        $title = 'Травматизм (кримінальний, виробничий)';
                        break;
                    default:
                        $obj=array();
                        $title = 'Неможливо відсортувати за вказаним параметром';
                        break;
                }
                break;
        }
        return view('front.show', ['ojects'=>$obj, 'title'=>$title, 'table'=>$table]);
    }

    public function sortShow($viddil, $table, $date)
    {
        //dd($date);
        $tables = ['fatal', 'dtp+ns', 'ns', 'high_travmy', 'tr_kytyzi', 'opic', 'travmat'];
        switch ($table) 
        {
            case 'Report2':
                $reports = Report2::where('punkt', $viddil)->orderBy('date', 'DESC')->get();
                return view('report.myShow2', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);
                break;
            case 'Report3':
                $reports = Report3::where('viddil', $viddil)->orderBy('date', 'DESC')->get();
                return view('report.myShow3', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);
                break;
            case 'Report4':
                $reports = Report4::where('viddil', $viddil)->orderBy('date', 'DESC')->get();
                return view('report.myShow4', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);
                break;
            case 'fatal':
            case 'dtp+ns':
            case 'ns':
            case 'high_travmy':
            case 'tr_kytyzi':
            case 'opic':
            case 'travmat':
                foreach ($tables as $j => $tab) 
                {
                    if ($table == $tab) 
                        { $exp = $j; }
                }
                for ($i=$exp; $i < count($tables); $i++) 
                {
                    $reports = Report5::where('viddil', $viddil)->where('pidtype', $tables[$i])->orderBy('date', 'DESC')->get();
                    if (!empty($reports->first()))
                    {
                        return view('report.myShow5', ['date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1', 'reports'=>$reports, 'table'=>$tables[$i]]);
                        break;
                    } 
                    elseif ((empty($reports->first()))&&($i == count($tables)-1)) //якщо елемент останній та порожній
                    {
                        return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>$tables[$i+1]]);
                        break;
                    } 
                    else
                    {
                        return redirect()->action('FrontController@myShow', ['date'=>$date, 'table'=>'Report6']);
                        break;
                    }                   
                }                    
                break;
            case 'Report6':
                $reports = Report6::where('subdiv', $viddil)->orderBy('date', 'DESC')->get();
                    return view('report.myShow6', ['reports'=>$reports, 'date'=>$date, 'viddil'=>$viddil, 'indicator'=>'1']);
                break;
        }
    }

    
}