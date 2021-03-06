<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($table, Request $request)
    {        
        $date = ($request->all())['date'];
        
        switch ($table) {
            case 'Report1':
                $this->validate($request, [
                    'date' => 'required|date|unique:total_reports',
                ]);
                $types = Group::where('group', 'call')->get()->first();
                $typ = explode(";", $types->title);

                $sections = Group::where('group', 'sections')->get()->first();
                $sect = explode(";", $sections->title);

                $gospit = Group::where('group', 'gosp')->get()->first();
                $gosp = explode(";", $gospit->title);

                $region = Group::where('group', 'region')->get()->first();
                $reg = explode(";", $region->title);

                return view('report.create1', ['types'=>$typ, 'sections'=>$sect, 'gospit'=>$gosp, 'region'=>$reg, 'date'=>$date]);
                break;
            case 'Report2':                
                return view('report.create2', ['date'=>$date]);
                break;
            case 'Report3':
                return view('report.create3', ['date'=>$date]);
                break;
            case 'Report4':
                return view('report.create4', ['date'=>$date]);
                break;
            case 'Report6':
                return view('report.create6', ['date'=>$date]);
                break;
            default:
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
                        $title = 'Спробуйте створити інший звіт, або зверніться до адміністратора';
                        return view('front.error', ['title'=>$title]);
                        break 2;
                }
                return view('report.create5', ['date'=>$date, 'title'=>$title, 'pidtype'=>$table]);
                break;
        }
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

            for ($i=0; $i < 5 ; $i++)
            {
                $report['day'] = $post["day$i"];  
                $report['night'] = $post["night$i"];
                $report['type'] = $i;
                $report['users'] = Auth::user()->name;
               
                $report['date'] = $post["date"];
                $report['chergovy'] = $post["chergovy"];
               
                if ($report['day'] == '')
                    { $report['day'] = '0'; }
                if ($report['night'] == '')
                    { $report['night'] = '0'; }
                Report1::create($report); 
            }

            for ($i=0; $i < 4; $i++) 
            { 
                switch ($i) 
                {
                    case 0:
                        $info['id_group'] = $sections->id;
                        $info['value'] = '';
                        for ($i=1; $i <= count($sect); $i++) 
                        {                         
                            $value = $post["value$i"];                        
                            if ($value == '') 
                            {$value = '0';}
                            
                            if ($i==count($sect)) 
                            {
                                $info['value'] .= $value;
                            }
                            else
                            {
                                $info['value'] .= $value.';';
                            }
                        }
                        $info['date'] = $post["date"];
                        $info['users'] = Auth::user()->name;
                        Info::create($info);
                    case 1:
                        $info['id_group'] = $gospit->id;
                        $info['value'] = '';
                        for ($i=count($sect)+1; $i <= count($sect)+count($gos); $i++) 
                        { 
                            $value = $post["value$i"];                      
                            if ($value == '') 
                            {$value = '0';}
                            if ($i==count($sect)+count($gos)) 
                            {
                                $info['value'] .= $value;
                            }
                            else
                            {
                                $info['value'] .= $value.';';
                            }
                        }
                        $info['date'] = $post["date"];
                        $info['users'] = Auth::user()->name;
                        Info::create($info);
                    case 2:
                        $info['id_group'] = $region->id;
                        $info['value'] = '';
                        for ($i=count($sect)+count($gos)+1; $i <= count($sect)+count($gos)+count($reg); $i++) 
                        { 
                            $value = $post["value$i"];                        
                            if ($value == '') 
                            {$value = '0';}

                            if ($i==count($sect)+count($gos)+count($reg)) 
                            {
                                $info['value'] .= $value;
                            }
                            else
                            {
                                $info['value'] .= $value.';';
                            }
                        }
                        $info['date'] = $post["date"];
                        $info['users'] = Auth::user()->name;
                        Info::create($info);
                    case 3:
                        $info['id_group'] = 1;
                        $info['value'] = '';
                        for ($i=count($sect)+count($gos)+count($reg)+1; $i <= count($sect)+count($gos)+count($reg)+2; $i++)
                        { 
                            $value = $post["value$i"];                        
                            if ($value == '') 
                            {$value = '0';}
                        
                            if ($i==count($sect)+count($gos)+count($reg)+2) 
                            {
                                $info['value'] .= $value;
                            }
                            else
                            {
                                $info['value'] .= $value.';';
                            }
                        }
                        $info['date'] = $post["date"];
                        $info['users'] = Auth::user()->name;
                        Info::create($info);
                }
            }        
            flash('Дані успішно збережені.');
            return redirect()->action('FrontController@myShow', 
                ['date'=>$post['date'], 'table'=>'Report1']);       
    }

    public function store2(Request $request)
    {
        $post = $request->all();
        $valid=Report2::select('date', 'updated_at', 'created_at')->get();
        $updt = date('Y-m-d H:i:s');

        $report['date'] = $post['date'];
        
        if (empty($valid->where('date', $report['date'])->first()))
        {
             $flash='Дані успішно збережені.';
            //Якщо за число додається вперше
        }  
        else
        {
           //за число додається не вперше
            $flash='Звіт з даною датою вже існує, тому записи додані до попереднього.';
            //дату створення беремо з бази та теперішню дату поновлення
            $report['created_at'] = $valid->where('date', $report['date'])->first()->created_at;
            $report['updated_at'] = $updt;
            
            //потрібно оновити дату в попередніх записах за дане число
            $treport = Report2::where('date', $report['date'])->get();
            foreach ($treport as $reps) 
            {
                $reps->updated_at = $updt;

               // $reps->update($report);
                $reps->save();
            }

            
        } 
          
        $report['users'] = Auth::user()->name;  
        for ($i=0; $i < (count($post)-2)/8 ; $i++) 
        {   
            $report['punkt'] = $post["punkt$i"];  
            $report['no_card'] = $post["no_card$i"];  
            $report['adress'] = $post["adress$i"];  
            $report['brig'] = $post["brig$i"];
            $report['time'] = $post["time$i"];
            $report['support'] = $post["support$i"];
            $report['cause'] = $post["cause$i"];
            $report['call'] = $post["call$i"];

            $limit=0;
            foreach ($report as $rep) 
            {
                if ($rep == '') 
                    { $limit++; }
            }
            if ($limit < (count($report)-3))
            {
                foreach ($report as $key => $rep)
                {
                    if ($rep == '')
                        { $report[$key] = ' '; }
                }
                Report2::create($report);
            }
        }
            
        
        flash($flash);
        return redirect()->action('FrontController@myShow', 
            ['date'=>$post['date'], 'table'=>'Report2']);
    }
	
	public function store3(Request $request)
    {
    	$post = $request->all();
        $report['date'] = $post['date'];  
        $report['users'] = Auth::user()->name;

        $valid=Report3::select('date', 'updated_at', 'created_at')->get();
        $updt = date('Y-m-d H:i:s');
        
        if (empty($valid->where('date', $report['date'])->first()))
        {
             $flash='Дані успішно збережені.';
            //Якщо за число додається вперше
        }  
        else
        {
           //за число додається не вперше
            $flash='Звіт з даною датою вже існує, тому записи додані до попереднього.';
            //дату створення беремо з бази та теперішню дату поновлення
            $report['created_at'] = $valid->where('date', $report['date'])->first()->created_at;
            $report['updated_at'] = $updt;
            
            //потрібно оновити дату в попередніх записах за дане число
            $treport = Report3::where('date', $report['date'])->get();
            foreach ($treport as $reps) 
            {
                $reps->updated_at = $updt;

               // $reps->update($report);
                $reps->save();
            }

            
        } 

        for ($i=0; $i < (count($post)-2)/11 ; $i++) 
            {                
                $report['timer'] = $post["date$i"];  
                $report['viddil'] = $post["viddil$i"];    
                $report['no_card'] = $post["no_card$i"];  
                $report['pib'] = $post["pib$i"];  
                $report['at'] = $post["at$i"];  
                $report['from'] = $post["from$i"];
                $report['direct'] = $post["direct$i"];
                $report['who_direct'] = $post["who_direct$i"];
                $report['diagnoz'] = $post["diagnoz$i"];
                $report['brig'] = $post["brig$i"];
                $report['other'] = $post["other$i"];
                                     
                $limit=0;
                foreach ($report as $rep) 
                {
                    if ($rep == '') 
                        { $limit++; }
                }
                if ($limit < (count($report)-3))
                {
                    foreach ($report as $key => $rep)
                    {
                        if ($rep == '')
                            { $report[$key] = ' '; }
                    }
                    Report3::create($report);
                }
            }
        flash($flash);
       return redirect()->action('FrontController@myShow', 
            ['date'=>$post['date'], 'table'=>'Report3']);
    }
	
	public function store4(Request $request)
    {
    	$post = $request->all();
        $report['date'] = $post['date']; 
        $report['users'] = Auth::user()->name; 

        $valid=Report4::select('date', 'updated_at', 'created_at')->get();
        $updt = date('Y-m-d H:i:s');
        
        if (empty($valid->where('date', $report['date'])->first()))
        {
             $flash='Дані успішно збережені.';
            //Якщо за число додається вперше
        }  
        else
        {
           //за число додається не вперше
            $flash='Звіт з даною датою вже існує, тому записи додані до попереднього.';
            //дату створення беремо з бази та теперішню дату поновлення
            $report['created_at'] = $valid->where('date', $report['date'])->first()->created_at;
            $report['updated_at'] = $updt;
            
            //потрібно оновити дату в попередніх записах за дане число
            $treport = Report4::where('date', $report['date'])->get();
            foreach ($treport as $reps) 
            {
                $reps->updated_at = $updt;

               // $reps->update($report);
                $reps->save();
            }            
        } 

        for ($i=0; $i < (count($post)-2)/12 ; $i++) 
            {                
                $report['timer'] = $post["date$i"];
                $report['no_card'] = $post["no_card$i"];
                $report['adress'] = $post["adress$i"];
                $report['viddil'] = $post["viddil$i"];  
                $report['pib'] = $post["pib$i"];  
                $report['age'] = $post["age$i"];  
                $report['diagnoz'] = $post["diagnoz$i"];
                $report['brig'] = $post["brig$i"];
                $report['tromb'] = $post["tromb$i"];
                $report['stent'] = $post["stent$i"];
                $report['gospital'] = $post["gospital$i"];
                $report['support'] = $post["support$i"];

                $limit=0;
                foreach ($report as $rep) 
                {
                    if ($rep == '') 
                        { $limit++; }
                }
                if ($limit < (count($report)-3))
                {
                    foreach ($report as $key => $rep)
                    {
                        if ($rep == '')
                        { 
                            if( $key == 'age' )
                            {
                                $report[$key] = 0;
                            }
                            else
                            {
                                $report[$key] = ' ';
                            } 
                        }
                    }
                    Report4::create($report);
                }
            }
        flash($flash);
        return redirect()->action('FrontController@myShow', 
            ['date'=>$post['date'], 'table'=>'Report4']);
    }

    public function store5(Request $request)
    {
        $post = $request->all();
        $report['date'] = $post['date'];  
        $report['pidtype'] = $post["pidtype"];
        $report['users'] = Auth::user()->name;

        $valid=Report5::select('date', 'pidtype', 'updated_at', 'created_at')->where('pidtype', $report['pidtype'])->get();
        $updt = date('Y-m-d H:i:s');
        
        if (empty($valid->where('date', $report['date'])->where('pidtype', $report['pidtype'])->first()))
        {
             $flash='Дані успішно збережені.';
            //Якщо за число додається вперше
        }  
        else
        {
           //за число додається не вперше
            $flash='Звіт з даною датою вже існує, тому записи додані до попереднього.';
            //дату створення беремо з бази та теперішню дату поновлення
            $report['created_at'] = $valid->where('date', $report['date'])->where('pidtype', $report['pidtype'])->first()->created_at;
            $report['updated_at'] = $updt;
            
            //потрібно оновити дату в попередніх записах за дане число
            $treport = Report5::where('date', $report['date'])->where('pidtype', $report['pidtype'])->get();
            foreach ($treport as $reps) 
            {
                $reps->updated_at = $updt;

               // $reps->update($report);
                $reps->save();
            }

            
        } 

        for ($i=0; $i < (count($post)-3)/9 ; $i++) 
            {      
                $report['timer'] = $post["date$i"];  
                $report['title'] = $post["title$i"];  
                $report['adress'] = $post["adress$i"];     
                $report['viddil'] = $post["viddil$i"];
                $report['pib'] = $post["pib$i"];  
                $report['no_card'] = $post["no_card$i"]; 
                $report['brig'] = $post["brig$i"];
                $report['other'] = $post["other$i"];
                
                $limit=0;
                foreach ($report as $rep) 
                {
                    if ($rep == '') 
                        { $limit++; }
                }
                if ($limit < (count($report)-3))
                {
                    foreach ($report as $key => $rep)
                    {
                        if ($rep == '')
                            { $report[$key] = ' '; }
                    }
                    Report5::create($report);
                }
            }
        flash($flash);        
        return redirect()->action('FrontController@myShow', 
                ['date'=>$post['date'], 'table'=>$report['pidtype']]);
    }

    public function store6(Request $request)
    {
        $post = $request->all();
        $report['date'] = $post['date']; 
        $report['users'] = Auth::user()->name; 

        $post = $request->all();
        $report['date'] = $post['date']; 
        $report['users'] = Auth::user()->name; 

        $valid=Report6::select('date', 'updated_at', 'created_at')->get();
        $updt = date('Y-m-d H:i:s');
        
        if (empty($valid->where('date', $report['date'])->first()))
        {
             $flash='Дані успішно збережені.';
            //Якщо за число додається вперше
        }  
        else
        {
           //за число додається не вперше
            $flash='Звіт з даною датою вже існує, тому записи додані до попереднього.';
            //дату створення беремо з бази та теперішню дату поновлення
            $report['created_at'] = $valid->where('date', $report['date'])->first()->created_at;
            $report['updated_at'] = $updt;
            
            //потрібно оновити дату в попередніх записах за дане число
            $treport = Report6::where('date', $report['date'])->get();
            foreach ($treport as $reps) 
            {
                $reps->updated_at = $updt;

               // $reps->update($report);
                $reps->save();
            }            
        } 

        for ($i=0; $i < (count($post)-2)/4 ; $i++) 
            {                
                $report['timer'] = $post["date$i"];   
                $report['no_card'] = $post["no_card$i"];  
                $report['subdiv'] = $post["subdiv$i"];  
                $report['other'] = $post["other$i"];  
                
                $limit=0;
                foreach ($report as $rep) 
                {
                    if ($rep == '') 
                        { $limit++; }
                }
                if ($limit < (count($report)-3))
                {
                    foreach ($report as $key => $rep)
                    {
                        if ($rep == '')
                            { $report[$key] = ' '; }
                    }
                    Report6::create($report);
                }
            }
        flash($flash);
        return redirect()->action('FrontController@myShow', 
            ['date'=>$post['date'], 'table'=>'Report6']);
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
                                $value = $post["value$i"];
                                if ($value == '') 
                                {$value = '0';}

                                if ($i==count($sect)) 
                                {
                                    $info['value'] .= $value;
                                }
                                else
                                {
                                    $info['value'] .= $value.';';
                                }
                            }
                            $info['date'] = $date;
                            $info['updated_at'] = $updt;
                            $info['users'] = Auth::user()->name;
                            $infoTable->update($info);
                            $infoTable->save();
                            
                        case 1:
                            $info['id_group'] = $gospit->id;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', $gospit->id)->first();                            
                            for ($i=count($sect)+1; $i <= count($sect)+count($gos); $i++) 
                            { 
                                $value = $post["value$i"];
                                if ($value == '') 
                                {$value = '0';}

                                if ($i==count($sect)+count($gos)) 
                                {
                                    $info['value'] .= $value;
                                }
                                else
                                {
                                    $info['value'] .= $value.';';
                                }
                            }
                            $info['date'] = $post["date"];
                            $info['updated_at'] = $updt;
                            $info['users'] = Auth::user()->name;
                            $infoTable->update($info);
                            $infoTable->save();
                            
                        case 2:
                            $info['id_group'] = $region->id;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', $region->id)->first();
                            for ($i=count($sect)+count($gos)+1; $i <= count($sect)+count($gos)+count($reg); $i++) 
                            { 
                                $value = $post["value$i"];
                                if ($value == '') 
                                {$value = '0';}

                                if ($i==count($sect)+count($gos)+count($reg)) 
                                {
                                    $info['value'] .= $value;
                                }
                                else
                                {
                                    $info['value'] .= $value.';';
                                }
                            }
                            $info['date'] = $post["date"];
                            $info['updated_at'] = $updt;
                            $info['users'] = Auth::user()->name;
                            $infoTable->update($info);
                            $infoTable->save();
                            
                        case 3:
                            $info['id_group'] = 1;
                            $info['value'] = '';
                            $infoTable = Info::where('date', $newDate)->where('id_group', '1')->first();
                            for ($i=count($sect)+count($gos)+count($reg)+1; $i <= count($sect)+count($gos)+count($reg)+2; $i++) 
                            { 
                                $value = $post["value$i"];
                                if ($value == '') 
                                {$value = '0';}

                                if ($i==count($sect)+count($gos)+count($reg)+2) 
                                {
                                    $info['value'] .= $value;
                                }
                                else
                                {
                                    $info['value'] .= $value.';';
                                }
                            }
                            $info['date'] = $post["date"];
                            $info['updated_at'] = $updt;
                            $info['users'] = Auth::user()->name;
                            $infoTable->update($info);
                            $infoTable->save();
                    }    
                }   
                $report['users'] = Auth::user()->name;
                $report['date'] = $date;
                $report['chergovy'] = $post["chergovy"];
                $report['updated_at'] = $updt;
                for ($i=0; $i < 5 ; $i++)
                {
                    $report['day'] = $post["day$i"];  
                    $report['night'] = $post["night$i"];
                    $report['type'] = $i;                   
                    if ($report['day'] == '')
                        { $report['day'] = ' '; }
                    if ($report['night'] == '')
                        { $report['night'] = ' '; }
                    $myReport = Report1::where('date', $report['date'])->where('type', $i)->first();  
                    $myReport->update($report);
                    $myReport->save();
                }
                flash('Зміни успішно внесені.');
                break;
            case 'Report2':
                $treport = Report2::where('date', $newDate)->get();
                $report['date'] = $date;
                $report['updated_at'] = $updt;
                $report['users'] = Auth::user()->name;

                if (count($treport) == (count($post)-3)/8)
                {   //якщо к-сть в запиті дорівнює к-сті в БД
                    for ($i=0; $i < count($treport) ; $i++) 
                    {   
                        $report['punkt'] = $post["punkt$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['time'] = $post["time$i"];
                        $report['support'] = $post["support$i"];
                        $report['cause'] = $post["cause$i"];
                        $report['call'] = $post["call$i"]; 

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                }
                elseif (count($treport) < (count($post)-3)/8)
                {   //якщо додані додаткові рядки
                    //поновлюємо існуючі
                    for ($i=0; $i < count($treport) ; $i++) 
                    {   
                        $report['punkt'] = $post["punkt$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['time'] = $post["time$i"];
                        $report['support'] = $post["support$i"];
                        $report['cause'] = $post["cause$i"];
                        $report['call'] = $post["call$i"]; 

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та додаємо нові
                    $report['created_at'] = Report2::where('date', $newDate)->first()->created_at; 

                    for ($i = count($treport); $i < (count($post)-3)/8; $i++) 
                    { 
                        $report['punkt'] = $post["punkt$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"];   
                        $report['brig'] = $post["brig$i"];
                        $report['time'] = $post["time$i"];
                        $report['support'] = $post["support$i"];
                        $report['cause'] = $post["cause$i"];
                        $report['call'] = $post["call$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            Report2::create($report);
                        }
                    }
                }
                else
                {   //якщо видалені рядки
                    //поновлюємо ті що прийшли з форми
                    for ($i=0; $i < (count($post)-3)/8 ; $i++) 
                    {   
                        $report['punkt'] = $post["punkt$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['time'] = $post["time$i"];
                        $report['support'] = $post["support$i"];
                        $report['cause'] = $post["cause$i"];
                        $report['call'] = $post["call$i"]; 

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save(); 
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та видаляємо всі решту
                    for ($i = (count($post)-3)/8 ; $i < count($treport); $i++) 
                    { 
                        $treport[$i]->delete();
                    }
                }
                flash('Зміни успішно внесені.');

                $reports = Report2::where('date', $newDate)->get();
                return view('report.myShow2', ['reports'=>$reports, 'date'=>$newDate]);
                break;
            case 'Report3':
                $treport = Report3::where('date', $newDate)->get();
                $report['date'] = $date;  
                $report['updated_at'] = $updt;
                $report['users'] = Auth::user()->name;

                if (count($treport) == (count($post)-3)/11)
                {   //якщо к-сть в запиті дорівнює к-сті в БД
                    for ($i=0; $i < count($treport) ; $i++) 
                    {  
                        $report['timer'] = $post["date$i"];    
                        $report['viddil'] = $post["viddil$i"];  
                        $report['no_card'] = $post["no_card$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['at'] = $post["at$i"];  
                        $report['from'] = $post["from$i"];
                        $report['direct'] = $post["direct$i"];
                        $report['who_direct'] = $post["who_direct$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                }
                elseif (count($treport) < (count($post)-3)/11)
                {   //якщо додані додаткові рядки
                    //поновлюємо існуючі
                    for ($i=0; $i < count($treport) ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];     
                        $report['viddil'] = $post["viddil$i"];
                        $report['no_card'] = $post["no_card$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['at'] = $post["at$i"];  
                        $report['from'] = $post["from$i"];
                        $report['direct'] = $post["direct$i"];
                        $report['who_direct'] = $post["who_direct$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та додаємо нові
                    $report['created_at'] = Report3::where('date', $newDate)->first()->created_at;

                    for ($i = count($treport); $i < (count($post)-3)/11; $i++) 
                    { 
                        $report['timer'] = $post["date$i"];     
                        $report['viddil'] = $post["viddil$i"];
                        $report['no_card'] = $post["no_card$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['at'] = $post["at$i"];  
                        $report['from'] = $post["from$i"];
                        $report['direct'] = $post["direct$i"];
                        $report['who_direct'] = $post["who_direct$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                       $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            Report3::create($report);
                        }
                    }
                }
                else
                {   //якщо видалені рядки
                    //поновлюємо ті що прийшли з форми
                    for ($i=0; $i < (count($post)-3)/11 ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];    
                        $report['viddil'] = $post["viddil$i"]; 
                        $report['no_card'] = $post["no_card$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['at'] = $post["at$i"];  
                        $report['from'] = $post["from$i"];
                        $report['direct'] = $post["direct$i"];
                        $report['who_direct'] = $post["who_direct$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save(); 
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }

                    //Та видаляємо всі решту
                    for ($i = (count($post)-3)/11 ; $i < count($treport); $i++) 
                    { 
                        $treport[$i]->delete();
                    }
                }
                flash('Зміни успішно внесені.');

                $reports = Report3::where('date', $newDate)->get();
                return view('report.myShow3', ['reports'=>$reports, 'date'=>$newDate]);
                break;
            case 'Report4':
                $treport = Report4::where('date', $newDate)->get();
                $report['date'] = $date;
                $report['updated_at'] = $updt;
                $report['users'] = Auth::user()->name;

                if (count($treport) == (count($post)-3)/12)
                {   //якщо к-сть в запиті дорівнює к-сті в БД
                    for ($i=0; $i < count($treport) ; $i++) 
                    {  
                        $report['timer'] = $post["date$i"];
                        $report['no_card'] = $post["no_card$i"];
                        $report['adress'] = $post["adress$i"];
                        $report['viddil'] = $post["viddil$i"];
                        $report['pib'] = $post["pib$i"];
                        $report['age'] = $post["age$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['tromb'] = $post["tromb$i"];
                        $report['stent'] = $post["stent$i"];
                        $report['gospital'] = $post["gospital$i"];
                        $report['support'] = $post["support$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                }
                elseif (count($treport) < (count($post)-3)/12)
                {   //якщо додані додаткові рядки
                    //поновлюємо існуючі
                    for ($i=0; $i < count($treport) ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];
                        $report['no_card'] = $post["no_card$i"];
                        $report['adress'] = $post["adress$i"];
                        $report['viddil'] = $post["viddil$i"];
                        $report['pib'] = $post["pib$i"];
                        $report['age'] = $post["age$i"];
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['tromb'] = $post["tromb$i"];
                        $report['stent'] = $post["stent$i"];
                        $report['gospital'] = $post["gospital$i"];
                        $report['support'] = $post["support$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та додаємо нові
                    $report['created_at'] = Report4::where('date', $newDate)->first()->created_at;

                    for ($i = count($treport); $i < (count($post)-3)/12; $i++) 
                    { 
                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"];
                        $report['viddil'] = $post["viddil$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['age'] = $post["age$i"];  
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['tromb'] = $post["tromb$i"];
                        $report['stent'] = $post["stent$i"];
                        $report['gospital'] = $post["gospital$i"];
                        $report['support'] = $post["support$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            Report4::create($report);
                        }
                    }
                }
                else
                {   //якщо видалені рядки
                    //поновлюємо ті що прийшли з форми
                    for ($i=0; $i < (count($post)-3)/12 ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['adress'] = $post["adress$i"];
                        $report['viddil'] = $post["viddil$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['age'] = $post["age$i"];  
                        $report['diagnoz'] = $post["diagnoz$i"];
                        $report['brig'] = $post["brig$i"];
                        $report['tromb'] = $post["tromb$i"];
                        $report['stent'] = $post["stent$i"];
                        $report['gospital'] = $post["gospital$i"];
                        $report['support'] = $post["support$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save(); 
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }

                    //Та видаляємо всі решту
                    for ($i = (count($post)-3)/12 ; $i < count($treport); $i++)
                    { 
                        $treport[$i]->delete();
                    }
                }
                flash('Зміни успішно внесені.');

                $reports = Report4::where('date', $newDate)->get();
                return view('report.myShow4', ['reports'=>$reports, 'date'=>$newDate]);
                break;            
            case 'Report6':
                $treport = Report6::where('date', $newDate)->get();
                $report['date'] = $date;
                $report['updated_at'] = $updt;
                $report['users'] = Auth::user()->name;

                if (count($treport) == (count($post)-3)/4)
                {   //якщо к-сть в запиті дорівнює к-сті в БД    
                    for ($i=0; $i < count($treport); $i++) 
                    { 
                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['subdiv'] = $post["subdiv$i"];  
                        $report['other'] = $post["other$i"]; 

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                }
                elseif (count($treport) < (count($post)-3)/4)
                {   //якщо додані додаткові рядки
                    //поновлюємо існуючі
                    for ($i=0; $i < count($treport) ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['subdiv'] = $post["subdiv$i"];  
                        $report['other'] = $post["other$i"]; 

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та додаємо нові 
                    $report['created_at'] = Report6::where('date', $newDate)->first()->created_at;

                    for ($i = count($treport); $i < (count($post)-3)/4; $i++) 
                    { 
                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['subdiv'] = $post["subdiv$i"];  
                        $report['other'] = $post["other$i"];  
                        
                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            Report6::create($report);
                        }
                    }
                }
                else
                {   //якщо видалені рядки
                    //поновлюємо ті що прийшли з форми
                    for ($i=0; $i < (count($post)-3)/4 ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];   
                        $report['no_card'] = $post["no_card$i"];  
                        $report['subdiv'] = $post["subdiv$i"];  
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-3))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save(); 
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та видаляємо всі решту
                    for ($i = (count($post)-3)/4 ; $i < count($treport); $i++)
                    { 
                        $treport[$i]->delete();
                    }
                }
                flash('Зміни успішно внесені.');
                
                $reports = Report6::where('date', $newDate)->get();
                return view('report.myShow6', ['reports'=>$reports, 'date'=>$newDate]);
                break;
            case 'fatal':
            case 'dtp+ns':
            case 'ns':
            case 'high_travmy':
            case 'tr_kytyzi':
            case 'opic':
            case 'travmat':
                //if (count($treport)+3 == count($post))
                $treport = Report5::where('date', $newDate)->where('pidtype', $table)->get();
                $report['date'] = $date;
                $report['pidtype'] = $table;
                $report['updated_at'] = $updt;
                $report['users'] = Auth::user()->name;
        
                if (count($treport) == (count($post)-3)/8)
                {   //якщо к-сть в запиті дорівнює к-сті в БД       
                    for ($i=0; $i < count($treport) ; $i++)
                    {       
                        $report['timer'] = $post["date$i"];  
                        $report['title'] = $post["title$i"];  
                        $report['adress'] = $post["adress$i"];     
                        $report['viddil'] = $post["viddil$i"]; 
                        $report['pib'] = $post["pib$i"];  
                        $report['no_card'] = $post["no_card$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                    }
                }
                elseif (count($treport) < (count($post)-3)/8)
                {   //якщо додані додаткові рядки
                    //поновлюємо існуючі
                    for ($i=0; $i < count($treport) ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];  
                        $report['title'] = $post["title$i"];  
                        $report['adress'] = $post["adress$i"]; 
                        $report['viddil'] = $post["viddil$i"];  
                        $report['pib'] = $post["pib$i"];  
                        $report['no_card'] = $post["no_card$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save();
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та додаємо нові 
                     $report['created_at'] = Report5::where('date', $newDate)->where('pidtype', $table)->first()->created_at;

                    for ($i = count($treport); $i < (count($post)-3)/8; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];  
                        $report['title'] = $post["title$i"];  
                        $report['adress'] = $post["adress$i"];  
                        $report['viddil'] = $post["viddil$i"]; 
                        $report['pib'] = $post["pib$i"];  
                        $report['no_card'] = $post["no_card$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-5))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            Report5::create($report);
                        }
                    }
                }
                else
                {   //якщо видалені рядки
                    //поновлюємо ті що прийшли з форми
                    for ($i=0; $i < (count($post)-3)/8 ; $i++) 
                    {   
                        $report['timer'] = $post["date$i"];  
                        $report['title'] = $post["title$i"];  
                        $report['adress'] = $post["adress$i"];  
                        $report['viddil'] = $post["viddil$i"]; 
                        $report['pib'] = $post["pib$i"];  
                        $report['no_card'] = $post["no_card$i"]; 
                        $report['brig'] = $post["brig$i"];
                        $report['other'] = $post["other$i"];

                        $limit=0;
                        foreach ($report as $rep) 
                        {
                            if ($rep == '') 
                                { $limit++; }
                        }
                        if ($limit < (count($report)-4))
                        {
                            foreach ($report as $key => $rep)
                            {
                                if ($rep == '')
                                    { $report[$key] = ' '; }
                            }
                            $treport[$i]->update($report);
                            $treport[$i]->save(); 
                        }
                        else
                        {
                            $treport[$i]->delete();
                        }
                    }
                    //Та видаляємо всі решту
                    for ($i = (count($post)-3)/8 ; $i < count($treport); $i++)
                    { 
                        $treport[$i]->delete();
                    }
                }
                flash('Зміни успішно внесені.');
                
                $reports = Report5::where('date', $newDate)->where('pidtype', $table)->get();
                return view('report.myShow5', ['reports'=>$reports, 'date'=>$newDate, 'table'=>$table]);
                break;   
        }   
    }  
}