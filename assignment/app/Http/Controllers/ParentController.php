<?php

namespace App\Http\Controllers;

use App\Parents;
use Illuminate\Http\Request;

use Gate;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $parents = Parents::with('students')->get();

        $data = array(
            'parents' => $parents
        );

        return view('parents')->with($data);

    }

    public function view($id)
    {
        $parent = Parents::find($id);

        $data = array(
            'parent' => $parent
        );

        return view('parentView')->with($data);

    }

    public function add()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        return view('parentAdd');

    }

    public function save(Request $request)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'type' => 'required',
        ]);

        $parent = new Parents();
        $parent->name = $request->name;
        $parent->dob = $request->dob;
        $parent->type = $request->type;

        $parent->save();

        return redirect()->route('parents');

    }

    public function edit($id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $parent = Parents::find($id);

        $data = array(
            'parent' => $parent
        );

        return view('parentEdit')->with($data);

    }

    public function update(Request $request,$id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'type' => 'required'
        ]);

        $parent = Parents::find($id);
        $parent->name = $request->name;
        $parent->dob = $request->dob;
        $parent->type = $request->type;

        $parent->save();

        return redirect()->route('parent_edit', $id);

    }

    public function delete($id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $parent = Parents::find($id);

        $parent->delete();


        return redirect()->route('parents');

    }
}
