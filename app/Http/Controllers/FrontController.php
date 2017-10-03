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
    //dd($id);
        switch ($id) 
        {
            case 'Report1':
                $obj=Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'РАПОРТ старших лікарів';
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
    //Report5 - fatal, dtp+ns, high_travmy, tr_kytyzi, opic, travmat
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
            case 'allReports':
                $obj=Report1::select('date', 'created_at', 'updated_at')->orderBy('date', 'DESC')->distinct('date')->paginate(10);
                $title = 'РАПОРТ старших лікарів';
                break;
            default:
                $obj=array();
                $title = 'ERROR 404/ NOT FOUND';

                break;
        }


        return view('front.show', ['ojects'=>$obj, 'title'=>$title, 'table'=>$id]);
    }

    public function QuickFind(Request $request)
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
                    //dd(($inf[$i]));
                }
                else 
                {
                    $inf[$i] = 0;
                }
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

    public function myShow(Request $request, $table, $date)
    {
        $req = $request->all();
        //dd($date);
        
        $title = $req['title'];

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
                for ($i=1; $i <= 4; $i++)
                {
                    $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();
                    
                    $inf[$i] = explode(";", $info[$i]->value);
                    //dd(($inf[$i]));
                }
                //dd($inf);

                return view('report.myShow1', ['date'=>$date, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'reports'=>$reports, 'title'=>$title, 'inf'=>$inf]);
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
                foreach ($tables as $key => $table) {
                    $reports5[$key] = Report5::where('date', $date)->where('pidtype', $table)->get();
                }
        //end Report5
                $reports6 = Report6::where('date', $date)->get();//Report11
                
                return view('report.reportsForm', ['date'=>$date, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'inf'=>$inf, 'reports1'=>$reports1, 'reports2'=>$reports2, 'reports3'=>$reports3, 'reports4'=>$reports4, 'reports5'=>$reports5, 'reports6'=>$reports6]);
                break;
        //end Full Report
            default:
                $reports = Report5::where('date', $date)->where('pidtype', $table)->get();
                return view('report.myShow5', ['reports'=>$reports, 'title'=>$title]);
                break;
        }
    }

    public function edit($table, $date)
    {
       // dd($date);
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
                for ($i=1; $i <= 4; $i++)
                {
                    $info[$i] = Info::where('id_group', $i)->where('date', $date)->first();
                    
                    $inf[$i] = explode(";", $info[$i]->value);
                    //dd(($inf[$i]));
                }
                //dd($inf);

                return view('report.edit1', ['date'=>$date, 'types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'reports'=>$reports, 'inf'=>$inf]);
                //break;
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
                //dd($reports);
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
                //break;

                return view('report.edit5', ['date'=>$date, 'table'=>$table, 'title'=>$title, 'reports'=>$reports]);
                break;
            
            
        }
    }

}
