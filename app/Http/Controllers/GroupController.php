<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;


class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$groups = Group::all();
    	return view('groups.index', ['groups'=>$groups]);
    }

    public function create()
    {
    	return view('groups.create');
    }

    public function store(Request $request)
    {
    	 Group::create($request->all());
    	 flash('Додано.');
    	 return back();
    }

    public function edit($id)
    {
    	$group = Group::find($id);
    	return view('groups.edit',['group'=>$group]);
    }

    public function update(Request $request, $id)
    {
        $group=Group::find($id);
        $group->update($request->all());
        $group->save();

        flash('Дані змінені.');
        return back();
    }
}
