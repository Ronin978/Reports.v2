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
                $obj=Report2::orderBy('date', 'DESC')->paginate(5);
                break;
            case 'Report3':
                $obj=Report3::orderBy('date')->paginate(5);
                break;
            case 'Report4':
                $obj=Report4::orderBy('date')->paginate(5);
                break;
           //Report5 - default
            case 'Report6':
                $obj=Report6::orderBy('date')->paginate(5);
                break;
            default:
                $obj=Report5::where('pidtype', $id)->paginate(5);
                break;
        }


        return view('front.show', ['ojects'=>$obj]);
    }

    public function QuickFind(Request $request)
    {
        //
    }
}
