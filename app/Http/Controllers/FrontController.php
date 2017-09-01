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
    public function index()
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

        $table4 = Info::where('id_group', '0')->where('date', $maxDate)->get()->first();
        $tabl4 = explode(";", $table4->value);
        
        return view('front.index', ['types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'table0'=>$table0, 'table1'=>$tabl1, 'table2'=>$tabl2, 'table3'=>$tabl3, 'table4'=>$tabl4, 'date'=>$maxDate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Group::where('group', 'call')->get()->first();
        $typ = explode(";", $types->title);

        $sections = Group::where('group', 'sections')->get()->first();
        $sect = explode(";", $sections->title);

        $gospit = Group::where('group', 'gosp')->get()->first();
        $gosp = explode(";", $gospit->title);

        $region = Group::where('group', 'region')->get()->first();
        $reg = explode(";", $region->title);

        return view('report.create1', ['types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg]);
    }

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
            
            default:
                $obj=array();
                $title = 'ERROR 404/ NOT FOUND';

                break;
        }


        return view('front.show', ['ojects'=>$obj, 'title'=>$title, 'id'=>$id]);
    }

    public function QuickFind(Request $request)
    {
        //
    }

    public function myShow(Request $request)
    {
        $req = $request->all();
        
        $date = $req['date'];
        $table = $req['table'];//pidtype or (and) name models
        $title = $req['title'];

        switch ($table) 
        {
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

        
       // dd($reports);
        
        

    }
}
