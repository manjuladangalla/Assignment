<?php

namespace App\Http\Controllers;

use App\ClassMaster;
use Illuminate\Http\Request;

use Gate;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = ClassMaster::with('students')->get();

        $data = array(
            'classes' => $classes
        );

        return view('classes')->with($data);

    }

    public function view($id)
    {
        $class = ClassMaster::find($id);

        $data = array(
            'class' => $class
        );

        return view('classView')->with($data);

    }

    public function add()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        return view('classAdd');

    }

    public function save(Request $request)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'year' => 'required|digits:4|integer|min:1900'
        ]);

        $class = new ClassMaster();
        $class->name = $request->name;
        $class->year = $request->year;

        $class->save();

        return redirect()->route('classes');

    }

    public function edit($id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $class = ClassMaster::find($id);

        $data = array(
            'class' => $class
        );

        return view('classEdit')->with($data);

    }

    public function update(Request $request,$id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'year' => 'required|digits:4|integer|min:1900'
        ]);

        $class = ClassMaster::find($id);
        $class->name = $request->name;
        $class->year = $request->year;

        $class->save();

        return redirect()->route('class_edit', $id);

    }

    public function delete($id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $class = ClassMaster::find($id);

        $class->delete();


        return redirect()->route('classes');

    }
}
