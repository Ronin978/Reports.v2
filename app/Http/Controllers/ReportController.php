<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\Group;
use App\Report1;
use App\Report2;
use App\Report3;
use App\Report4;
use App\Report5;
use App\Report6;

class ReportController extends Controller
{
    public function create1()
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

    public function create2(Request $request)
    {
        
        $date = ($request->all())['date'];
        //dd($post['date']);
        return view('report.create2', ['date'=>$date]);
    }

    public function create3(Request $request)
    {
        $date = ($request->all())['date'];
        return view('report.create3', ['date'=>$date]);
    }

    public function create4(Request $request)
    {
        $date = ($request->all())['date'];
        return view('report.create4', ['date'=>$date]);
    }

    public function create5(Request $request)
    {
        $date = ($request->all())['date'];
        $title = 'Смертність в присутності бригади (успішна реанімація)';
        $pidtype = 'fatal';
        return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$pidtype]);
    }

    public function create6(Request $request)
    {
        $date = ($request->all())['date'];
        $title = 'ДТП і «НС» (надзвичайні стани)';
        $pidtype = 'dtp+ns';
        return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$pidtype]);
    }

    public function create7(Request $request)
    {
        $date = ($request->all())['date'];
        $title = 'Складні травми';
        $pidtype = 'high_travmy';
        return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$pidtype]);
    }

    public function create8(Request $request)
    {
        $date = ($request->all())['date'];
        $title = 'Травми китиці';
        $pidtype = 'tr_kytyzi';
        return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$pidtype]);
    }

    public function create9(Request $request)
    {
        $date = ($request->all())['date'];
        $title = 'Опіки/ Переохолодження';
        $pidtype = 'opic';
        return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$pidtype]);
    }

    public function create10(Request $request)
    {
        $date = ($request->all())['date'];
        $title = 'Травматизм (кримінальний, виробничий)';
        $pidtype = 'travmat';
        return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$pidtype]);
    }

    public function create11(Request $request)
    {
        $date = ($request->all())['date'];
        return view('report.create6', ['date'=>$date]);
    }


    public function store1(Request $request)
    {
        $post = $request->all();

        $sections = Group::where('group', 'sections')->get()->first();
        $sect = explode(";", $sections->title);

        $gospit = Group::where('group', 'gosp')->get()->first();
        $gos = explode(";", $gospit->title);

        $region = Group::where('group', 'region')->get()->first();
        $reg = explode(";", $region->title);

        for ($i=0; $i < 4; $i++) 
        { 
            switch ($i) 
            {
                case 0:
                    $info['id_group'] = $sections->id;
                    $info['value'] = '';
                    for ($i=1; $i <= count($sect); $i++) 
                    {                         
                        if ($i==count($sect)) 
                        {
                            $info['value'] .= $post["value$i"];
                        }
                        else
                        {
                            $info['value'] .= $post["value$i"].';';
                        }
                    }
                    $info['date'] = $post["date"];
                    Info::create($info);
                    //break 1;
                case 1:
                    $info['id_group'] = $gospit->id;
                    $info['value'] = '';
                    for ($i=count($sect)+1; $i <= count($sect)+count($gos); $i++) 
                    { 
                        if ($i==count($sect)+count($gos)) 
                        {
                            $info['value'] .= $post["value$i"];
                        }
                        else
                        {
                            $info['value'] .= $post["value$i"].';';
                        }
                    }
                    $info['date'] = $post["date"];
                    Info::create($info);
                    //break 1;
                case 2:
                    $info['id_group'] = $region->id;
                    $info['value'] = '';
                    for ($i=count($sect)+count($gos)+1; $i <= count($sect)+count($gos)+count($reg); $i++) 
                    { 
                        if ($i==count($sect)+count($gos)+count($reg)) 
                        {
                            $info['value'] .= $post["value$i"];
                        }
                        else
                        {
                            $info['value'] .= $post["value$i"].';';
                        }
                    }
                    $info['date'] = $post["date"];
                    Info::create($info);
                    //break 1;
                case 3:
                    $info['id_group'] = 1;
                    $info['value'] = '';
                    for ($i=count($sect)+count($gos)+count($reg)+1; $i <= count($sect)+count($gos)+count($reg)+2; $i++) 
                    { 
                        if ($i==count($sect)+count($gos)+count($reg)+2) 
                        {
                            $info['value'] .= $post["value$i"];
                        }
                        else
                        {
                            $info['value'] .= $post["value$i"].';';
                        }
                    }
                    $info['date'] = $post["date"];
                    Info::create($info);
                   // break 1;
            }
             
        }
        

        for ($i=0; $i < 5 ; $i++)
        {
            $report['day'] = $post["day$i"];  
            $report['night'] = $post["night$i"];
            $report['type'] = $i;
           
            $report['date'] = $post["date"];
            $report['chergovy'] = $post["chergovy"];
           
            Report1::create($report); 
        }
        flash('Дані внесені.');
        return redirect()->action('ReportController@create2', 
            ['date'=>$post['date']]);
    }

    public function store2(Request $request)
    {
        $post = $request->all();
        $date = $post['date'];
        for ($i=0; $i < (count($post)-2)/8 ; $i++) 
            {                
                $report['date'] = $date;  
                $report['punkt'] = $post["punkt$i"];  
                $report['no_card'] = $post["no_card$i"];  
                $report['adress'] = $post["adress$i"];  
                $report['brig'] = $post["brig$i"];
                $report['time'] = $post["time$i"];
                $report['support'] = $post["support$i"];
                $report['cause'] = $post["cause$i"];
                $report['call'] = $post["call$i"];
                                     
                Report2::create($report);
            }
        flash('Дані внесені.');
        return redirect()->action('ReportController@create3', 
            ['date'=>$post['date']]);
    }
	
	public function store3(Request $request)
    {
    	$post = $request->all();
        $date = $post['date'];
        for ($i=0; $i < (count($post)-2)/10 ; $i++) 
            {                
                $report['date'] = $date;  
                $report['timer'] = $post["date$i"];  
                $report['no_card'] = $post["no_card$i"];  
                $report['pib'] = $post["pib$i"];  
                $report['at'] = $post["at$i"];  
                $report['from'] = $post["from$i"];
                $report['direct'] = $post["direct$i"];
                $report['who_direct'] = $post["who_direct$i"];
                $report['diagnoz'] = $post["diagnoz$i"];
                $report['brig'] = $post["brig$i"];
                $report['other'] = $post["other$i"];
                                     
                Report3::create($report);
            }
        flash('Дані внесені.');
        return redirect()->action('ReportController@create4', 
            ['date'=>$post['date']]);
    }
	
	public function store4(Request $request)
    {
    	$post = $request->all();
       // dd($post);
        $date = $post['date'];
        for ($i=0; $i < (count($post)-2)/11 ; $i++) 
            {                
                $report['date'] = $date;  
                $report['timer'] = $post["date$i"];   
                $report['no_card'] = $post["no_card$i"];  
                $report['adress'] = $post["adress$i"];  
                $report['pib'] = $post["pib$i"];  
                $report['age'] = $post["age$i"];  
                $report['diagnoz'] = $post["diagnoz$i"];
                $report['brig'] = $post["brig$i"];
                $report['tromb'] = $post["tromb$i"];
                $report['stent'] = $post["stent$i"];
                $report['gospital'] = $post["gospital$i"];
                $report['support'] = $post["support$i"];
                                     
                Report4::create($report);
            }
        flash('Дані внесені.');
        return redirect()->action('ReportController@create5', 
            ['date'=>$post['date']]);
    }

    public function store5(Request $request)
    {
        $post = $request->all();
        //dd($post);
        $date = $post['date'];

        $report['pidtype'] = $post["pidtype"];
        for ($i=0; $i < (count($post)-3)/8 ; $i++) 
            {                
                  
                $report['date'] = $date;  
                $report['timer'] = $post["date$i"];  
                $report['title'] = $post["title$i"];  
                $report['adress'] = $post["adress$i"];  
                $report['pib'] = $post["pib$i"];  
                $report['no_card'] = $post["no_card$i"]; 
                $report['brig'] = $post["brig$i"];
                $report['other'] = $post["other$i"];
                                     
                Report5::create($report);
            }
        flash('Дані внесені.');
        
        if ($report['pidtype'] == 'fatal') 
        {
            return redirect()->action('ReportController@create6', ['date'=>$post['date']]);
        }
        elseif ($report['pidtype'] == 'dtp+ns') 
        {
            return redirect()->action('ReportController@create7', ['date'=>$post['date']]);
        }
        elseif ($report['pidtype'] == 'high_travmy') 
        {
            return redirect()->action('ReportController@create8', ['date'=>$post['date']]);
        }
        elseif ($report['pidtype'] == 'tr_kytyzi') 
        {
            return redirect()->action('ReportController@create9', ['date'=>$post['date']]);
        }
        elseif ($report['pidtype'] == 'opic') 
        {
            return redirect()->action('ReportController@create10', ['date'=>$post['date']]);
        }
        elseif ($report['pidtype'] == 'travmat') 
        {
            return redirect()->action('ReportController@create11', ['date'=>$post['date']]);
        }
           
    }

    public function store6(Request $request)
    {
        $post = $request->all();
       // dd($post);
        $date = $post['date'];
        for ($i=0; $i < (count($post)-2)/4 ; $i++) 
            {                
                $report['date'] = $date;  
                $report['timer'] = $post["date$i"];   
                $report['no_card'] = $post["no_card$i"];  
                $report['subdiv'] = $post["subdiv$i"];  
                $report['other'] = $post["other$i"];  
                                   
                Report6::create($report);
            }
        flash('Дані внесені.');
        return redirect()->action('FrontController@index');
    }

    public function update(Request $request, $table, $newDate)
    {
    
    $post = $request->all();
    $updt = date('Y-m-d H:i:s');
    $date = $post['date'];
    switch ($table) 
        {
            case 'Report1':
               
                $sections = Group::where('group', 'sections')->first();
                $sect = explode(";", $sections->title);

                $gospit = Group::where('group', 'gosp')->first();
                $gos = explode(";", $gospit->title);

                $region = Group::where('group', 'region')->first();
                $reg = explode(";", $region->title);

                for ($i=0; $i < 4; $i++) 
                { 
                    switch ($i) 
                    {
                        case 0: 
                            $info['id_group'] = $sections->id;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', $sections->id)->first();
                            
                            for ($i=1; $i <= count($sect); $i++) 
                            {                         
                                if ($i==count($sect)) 
                                {
                                    $info['value'] .= $post["value$i"];
                                }
                                else
                                {
                                    $info['value'] .= $post["value$i"].';';
                                }
                            }
                            $info['date'] = $date;
                            $info['updated_at'] = $updt;
                            $infoTable->update($info);
                            $infoTable->save();
                            
                        case 1:
                            $info['id_group'] = $gospit->id;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', $gospit->id)->first();                            
                            for ($i=count($sect)+1; $i <= count($sect)+count($gos); $i++) 
                            { 
                                if ($i==count($sect)+count($gos)) 
                                {
                                    $info['value'] .= $post["value$i"];
                                }
                                else
                                {
                                    $info['value'] .= $post["value$i"].';';
                                }
                            }
                            $info['date'] = $post["date"];
                            $info['updated_at'] = $updt;
                            $infoTable->update($info);
                            $infoTable->save();
                            
                        case 2:
                            $info['id_group'] = $region->id;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', $region->id)->first();
                            for ($i=count($sect)+count($gos)+1; $i <= count($sect)+count($gos)+count($reg); $i++) 
                            { 
                                if ($i==count($sect)+count($gos)+count($reg)) 
                                {
                                    $info['value'] .= $post["value$i"];
                                }
                                else
                                {
                                    $info['value'] .= $post["value$i"].';';
                                }
                            }
                            $info['date'] = $post["date"];
                            $info['updated_at'] = $updt;
                            $infoTable->update($info);
                            $infoTable->save();
                            
                        case 3:
                            $info['id_group'] = 1;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', '1')->first();
                            for ($i=count($sect)+count($gos)+count($reg)+1; $i <= count($sect)+count($gos)+count($reg)+2; $i++) 
                            { 
                                if ($i==count($sect)+count($gos)+count($reg)+2) 
                                {
                                    $info['value'] .= $post["value$i"];
                                }
                                else
                                {
                                    $info['value'] .= $post["value$i"].';';
                                }
                            }
                            $info['date'] = $post["date"];
                            $info['updated_at'] = $updt;
                            $infoTable->update($info);
                            $infoTable->save();
                    }    
                }                

                for ($i=0; $i < 5 ; $i++)
                {
                    $report['day'] = $post["day$i"];  
                    $report['night'] = $post["night$i"];
                    $report['type'] = $i;
                   
                    $report['date'] = $date;
                    $report['chergovy'] = $post["chergovy"];
                   
                    $myReport = Report1::where('date', $report['date'])->where('type', $i)->first(); 
                    $report['updated_at'] = $updt;
                    $myReport->update($report);
                    $myReport->save();
                }
                flash('Дані внесені.');
                break;
            case 'Report2':
                
                //if (count($treport)+3 == count($post))
                $treport = Report2::where('date', $newDate)->get();

                for ($i=0; $i < (count($post)-3)/8 ; $i++) 
                    {                
                        $report['date'] = $date; 

                        $report['punkt'] = $post["punkt$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"];  
                        $report['brig'] = $post["brig$i"];
                        $report['time'] = $post["time$i"];
                        $report['support'] = $post["support$i"];
                        $report['cause'] = $post["cause$i"];
                        $report['call'] = $post["call$i"];       
                        
                        $report['updated_at'] = $updt;
                        $treport[$i]->update($report);
                        $treport[$i]->save();
                    }
                flash('Дані внесені.2');
                break;
            case 'Report3':
               //dd($post);
                //if (count($treport)+3 == count($post))
                $treport = Report3::where('date', $newDate)->get();

                for ($i=0; $i < (count($post)-3)/10 ; $i++) 
                    {                
                        $report['date'] = $date;  

                        $report['timer'] = $post["date$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['at'] = $post["at$i"];  
                        $report['from'] = $post["from$i"];
                        $report['direct'] = $post["direct$i"];
                        $report['who_direct'] = $post["who_direct$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $report['updated_at'] = $updt;
                        $treport[$i]->update($report);
                        $treport[$i]->save();
                    }
                flash('Дані внесені.3');
                break;
            case 'Report4':
                //if (count($treport)+3 == count($post))
                $treport = Report4::where('date', $newDate)->get();

                for ($i=0; $i < (count($post)-3)/11 ; $i++) 
                    {                
                        $report['date'] = $date;

                        $report['timer'] = $post["date$i"];
                        $report['no_card'] = $post["no_card$i"];
                        $report['adress'] = $post["adress$i"];
                        $report['pib'] = $post["pib$i"];
                        $report['age'] = $post["age$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['tromb'] = $post["tromb$i"];
                        $report['stent'] = $post["stent$i"];
                        $report['gospital'] = $post["gospital$i"];
                        $report['support'] = $post["support$i"];

                        $report['updated_at'] = $updt;
                        $treport[$i]->update($report);
                        $treport[$i]->save();
                    }
                flash('Дані внесені.4');
                break;
            
            case 'Report6':
                //if (count($treport)+3 == count($post))
                $treport = Report6::where('date', $newDate)->get();

                for ($i=0; $i < (count($post)-3)/4 ; $i++) 
                    {                
                        $report['date'] = $date;

                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['subdiv'] = $post["subdiv$i"];  
                        $report['other'] = $post["other$i"]; 

                        $report['updated_at'] = $updt;
                        $treport[$i]->update($report);
                        $treport[$i]->save();
                    }
                flash('Дані внесені.6');
                break;

            case ('fatal'||'dtp+ns'||'high_travmy'||'tr_kytyzi'||'opic'||'travmat'):
                //if (count($treport)+3 == count($post))
                $treport = Report5::where('date', $newDate)->where('pidtype', $table)->get();
                for ($i=0; $i < (count($post)-3)/7 ; $i++)
                    {                
                        $report['date'] = $date;
                        $report['pidtype'] = $table;
                          
                        $report['timer'] = $post["date$i"];  
                        $report['title'] = $post["title$i"];  
                        $report['adress'] = $post["adress$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['no_card'] = $post["no_card$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $report['updated_at'] = $updt;
                        $treport[$i]->update($report);
                        $treport[$i]->save();
                    }
                flash('Дані внесені.5');
                break;   
        }   
        return back();
    }  
}