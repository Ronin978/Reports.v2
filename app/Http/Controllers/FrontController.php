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

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'QuickFind', 'myShow']]);
    }

    public function index()
    {
        if (Info::where('id_group', '1')->first())
        {
            $maxDate = Info::max('date');

            $types = Group::where('group', 'call')->get()->first();
            $typ = explode(";", $types->title);
            $table0 = Report1::where('date', $maxDate)->get();

            
            $table1 = Info::where('id_group', '4')->where('date', $maxDate)->get()->first();
            $tabl1 = explode(";", $table1->value);
            $sections = Group::where('group', 'sections')->get()->first();
            $sect = explode(";", $sections->title);

            $table2 = Info::where('id_group', '2')->where('date', $maxDate)->get()->first();
            $tabl2 = explode(";", $table2->value);
            $gospit = Group::where('group', 'gosp')->get()->first();
            $gosp = explode(";", $gospit->title);

            $table3 = Info::where('id_group', '3')->where('date', $maxDate)->get()->first();
            $tabl3 = explode(";", $table3->value);
            $region = Group::where('group', 'region')->get()->first();
            $reg = explode(";", $region->title);

            $table4 = Info::where('id_group', '1')->where('date', $maxDate)->get()->first();
            $tabl4 = explode(";", $table4->value);
            
            return view('front.index', ['types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'table0'=>$table0, 'table1'=>$tabl1, 'table2'=>$tabl2, 'table3'=>$tabl3, 'table4'=>$tabl4, 'date'=>$maxDate]);
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
                $title = 'РАПОРТ старших лікарів';
/*                $sort_flags = SORT_REGULAR;
                
                $obj1 = Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $obj2 = Report2::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $obj3 = Report3::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $obj4 = Report4::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $obj5 = Report5::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $obj6 = Report6::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
//dd($obj6);
                
                foreach ($obj1 as $key => $val1) 
                {   
                    $obj11['date'][$key] = $val1->date;
                    $obj11['updated_at'][$key] = $val1->updated_at;
                    $obj11['created_at'][$key] = $val1->created_at; 
                }
                foreach ($obj2 as $key => $val2) 
                {   
                    $obj22['date'][$key] = $val2->date;
                    $obj22['updated_at'][$key] = $val2->updated_at;
                    $obj22['created_at'][$key] = $val2->created_at; 
                }
                foreach ($obj3 as $key => $val3) 
                {   
                    $obj33['date'][$key] = $val3->date;
                    $obj33['updated_at'][$key] = $val3->updated_at;
                    $obj33['created_at'][$key] = $val3->created_at; 
                }
                foreach ($obj4 as $key => $val4) 
                {   
                    $obj44['date'][$key] = $val4->date; 
                    $obj44['updated_at'][$key] = $val4->updated_at;
                    $obj44['created_at'][$key] = $val4->created_at; 
                }
                foreach ($obj5 as $key => $val5) 
                {   
                    $obj55['date'][$key] = $val5->date;
                    $obj55['updated_at'][$key] = $val5->updated_at;
                    $obj55['created_at'][$key] = $val5->created_at; 
                }
                foreach ($obj6 as $key => $val6) 
                {   
                    $obj66['date'][$key] = $val6->date;
                    $obj66['updated_at'][$key] = $val6->updated_at;
                    $obj66['created_at'][$key] = $val6->created_at;
                }
               
               // $array = rsort($arr);
               // dd($obj33['date']);

                $arr1 = array_merge($obj11['date'], $obj22['date'], $obj33['date'], $obj44['date'], $obj55['date'], $obj66['date']);

                $arr2 = array_merge($obj11['updated_at'], $obj22['updated_at'], $obj33['updated_at'], $obj44['updated_at'], $obj55['updated_at'], $obj66['updated_at']);

                $arr3 = array_merge($obj11['created_at'], $obj22['created_at'], $obj33['created_at'], $obj44['created_at'], $obj55['created_at'], $obj66['created_at']);

                $array1 = array_unique($arr1);

                $clon2 = clone $obj6;
                $paginator = clone $obj1;

                $paginator->getCollection()->transform(function ($value) 
                {
                        // Your code here    
                });



               // 
//dd($obj6);
                //Формуємо кінцевий масив

                for ($key = 0; $key < count($array1); $key++) 
                {
                    $i = key($array1);
                    //print($i);
                    $clon1 = $clon2->items();//і-тий запис. В obj6 тільки 2 - '0' та '1'

                    $clon['date'][$key] = $array1[$i];
                    $clon['updated_at'][$key] = $arr2[$i];
                    $clon['created_at'][$key] = $arr3[$i];

//                    $clon1->date = $clon['date'][$key];
//                    $clon1->updated_at = $clon['updated_at'][$key];
//                    $clon1->created_at = $clon['created_at'][$key];
                
                    next($array1);
                }
                
                //dd(get_class_methods($));
              //dd($clon);
    */
                $obj = Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                
                //this->список всіх можливих дат з різних моделей
                break;
    //Report5 - fatal, dtp+ns, high_travmy, tr_kytyzi, opic, travmat
            default:
                switch ($id)
                {
                    case 'fatal':
                        $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                        $title = 'Смертність в присутності бригади (успішна реанімація)';
                        break;
                    case 'dtp+ns':
                        $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                        $title = 'ДТП і «НС» (надзвичайні стани)';
                        break;
                    case 'high_travmy':
                        $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                        $title = 'Складні травми';
                        break;
                    case 'tr_kytyzi':
                        $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                        $title = 'Травми китиці';
                        break;
                    case 'opic':
                        $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                        $title = 'Опіки/ Переохолодження';
                        break;
                    case 'travmat':
                        $obj=Report5::select('date', 'created_at', 'updated_at')->where('pidtype', $id)->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                        $title = 'Травматизм (кримінальний, виробничий)';
                        break;
                    default:
                        $obj=array();
                        $title = 'ERROR 404/ NOT FOUND';
                        break;
                }
        }
        return view('front.show', ['ojects'=>$obj, 'title'=>$title, 'table'=>$id]);
    }

    public function myShow($date, $table)
    {
        $datell = explode('-', $date);
        $dateD = "$datell[2]-$datell[1]-$datell[0]";
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
                    flash('Звіту з такою датою не існує.');
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
                $reports = Report2::where('date', $date)->get();
                if (empty($reports->first())) 
                {
                    flash('Звіту з такою датою не існує.');
                    return back();
                }
                else
                {    
                    return view('report.myShow2', ['reports'=>$reports, 'date'=>$dateD]);
                }
                break;
            case 'Report3':
                $reports = Report3::where('date', $date)->get();
                if (empty($reports->first())) 
                {
                    flash('Звіту з такою датою не існує.');
                    return back();
                }
                else
                {    
                    return view('report.myShow3', ['reports'=>$reports, 'date'=>$dateD]);
                }
                break;
            case 'Report4':
                $reports = Report4::where('date', $date)->get();
                if (empty($reports->first())) 
                {
                    flash('Звіту з такою датою не існує.');
                    return back();
                }
                else
                {    
                    return view('report.myShow4', ['reports'=>$reports, 'date'=>$dateD]);
                }
                break;
            case 'Report6':
                $reports = Report6::where('date', $date)->get();
                if (empty($reports->first())) 
                {
                    flash('Звіту з такою датою не існує.');
                    return back();
                }
                else
                {    
                    return view('report.myShow6', ['reports'=>$reports, 'date'=>$dateD]);
                }
                break;
            case 'allReports':
        //and fullReport
        //Report1
               
                $types = Group::where('group', 'call')->get()->first();
                $typ = explode(";", $types->title);

                $sections = Group::where('group', 'sections')->get()->first();
                $sect = explode(";", $sections->title);

                $gospit = Group::where('group', 'gosp')->get()->first();
                $gosp = explode(";", $gospit->title);

                $region = Group::where('group', 'region')->get()->first();
                $reg = explode(";", $region->title);
               
                $reports1 = Report1::where('date', $date)->get();
                for ($i=1; $i <= 4; $i++)
                {
                    $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();                    
                    $inf[$i] = explode(";", $info[$i]->value);
                    //dd(($inf[$i]));
                }
               
            //end Report1
                $reports2 = Report2::where('date', $date)->get();//Report2
                $reports3 = Report3::where('date', $date)->get();//Report3
                $reports4 = Report4::where('date', $date)->get();//Report4
            //Report5
                
                $tables = ['fatal', 'dtp+ns', 'high_travmy', 'tr_kytyzi', 'opic', 'travmat'];
                foreach ($tables as $key => $table) 
                {
                    $reports5[$key] = Report5::where('date', $date)->where('pidtype', $table)->get();
                }
                
            //end Report5
                $reports6 = Report6::where('date', $date)->get();//Report11
                
                return view('report.reportsForm', ['date'=>$dateD, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'inf'=>$inf, 'reports1'=>$reports1, 'reports2'=>$reports2, 'reports3'=>$reports3, 'reports4'=>$reports4, 'reports5'=>$reports5, 'reports6'=>$reports6]);
                break;
        //end Full Report
            case 'fatal'||'dtp+ns'||'high_travmy'||'tr_kytyzi'||'opic'||'travmat':
                
                    $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                if (empty($reports->first())) 
                {
                    flash('Звіту з такою датою не існує.');
                    return back();
                }
                else
                {               
                    return view('report.myShow5', ['date'=>$dateD, 'reports'=>$reports, 'table'=>$table]);
                }
                break;
            
            default:
                $table = 'ERROR';
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
            $reports2 = Report2::where('date', $date)->get();//Report2
            $reports3 = Report3::where('date', $date)->get();//Report3
            $reports4 = Report4::where('date', $date)->get();//Report4
    //Report5
            $tables = ['fatal', 'dtp+ns', 'high_travmy', 'tr_kytyzi', 'opic', 'travmat'];
            foreach ($tables as $key => $table) {
                $reports5[$key] = Report5::where('date', $date)->where('pidtype', $table)->get();
            }
    //end Report5
            $reports6 = Report6::where('date', $date)->get();//Report11
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
        $date = "$dateStart --- $dateEnd";

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
                $reports = Report2::where('date', $date)->get();
                return view('report.myShow2', ['reports'=>$reports, 'title'=>$title]);
                break;
            case 'Report3':
                $reports = Report3::where('date', $date)->get();
                return view('report.myShow3', ['reports'=>$reports, 'title'=>$title]);
                break;
            case 'Report4':
                $reports = Report4::where('date', $date)->get();
                return view('report.myShow4', ['reports'=>$reports, 'title'=>$title]);
                break;
            case 'Report6':
                $reports = Report6::where('date', $date)->get();
                return view('report.myShow6', ['reports'=>$reports, 'title'=>$title]);
                break;
            default:
                $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                return view('report.myShow5', ['reports'=>$reports, 'title'=>$title]);
                break;
        }
    }
    public function edit($table, $date)
    {
    switch ($table) 
        {
            case 'allReports':
                $title = 'Дана фукція в розробці. Редагуйте таблиці по одній, в головному меню.';
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
                $reports = Report2::where('date', $date)->get();
                return view('report.edit2', ['date'=>$date, 'reports'=>$reports]);
                break;
            case 'Report3':
                $reports = Report3::where('date', $date)->get();
                return view('report.edit3', ['date'=>$date, 'reports'=>$reports]);
                break;
            case 'Report4':
                $reports = Report4::where('date', $date)->get();
                return view('report.edit4', ['date'=>$date, 'reports'=>$reports]);
                break;
            case 'Report6':
                $reports = Report6::where('date', $date)->get();
                return view('report.edit6', ['date'=>$date, 'reports'=>$reports]);
                break;
    //Report5 - fatal, dtp+ns, high_travmy, tr_kytyzi, opic, travmat
            default:
                switch ($table) 
                {
                    case 'fatal':
                        $title = 'Смертність в присутності бригади (успішна реанімація)';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                        break;
                    case 'dtp+ns':
                        $title = 'ДТП і «НС» (надзвичайні стани)';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                        break;
                    case 'high_travmy':
                        $title = 'Складні травми';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                        break;
                    case 'tr_kytyzi':
                        $title = 'Травми китиці';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                        break;
                    case 'opic':
                        $title = 'Опіки/ Переохолодження';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                        break;
                    case 'travmat':
                        $title = 'Травматизм (кримінальний, виробничий)';
                        $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                        break;                    
                    default:
                        $title = 'ERROR 404/ NOT FOUND';
                        break;
                }
                return view('report.edit5', ['date'=>$date, 'table'=>$table, 'title'=>$title, 'reports'=>$reports]);
                break;
        }
    }
}
