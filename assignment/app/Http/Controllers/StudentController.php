<?php

namespace App\Http\Controllers;


use App\ClassMaster;
use App\Student;
use Illuminate\Http\Request;
use Gate;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $classes = ClassMaster::all();

        $data = array(
            'classes' => $classes
        );

        return view('student')->with($data);

    }

    public function view($id)
    {
        $student = Student::find($id);

        $data = array(
            'student' => $student
        );

        return view('studentView')->with($data);
    }

    public function edit($id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $student = Student::find($id);
        $classes = ClassMaster::all();

        $data = array(
            'student' => $student,
            'classes' => $classes
        );

        return view('studentEdit')->with($data);
    }

    public function save(Request $request)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'city' => 'required',
            'class_id' => 'required',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->city = $request->city;
        $student->class_id = $request->class_id;

        $student->save();

        return redirect()->route('home');

    }

    public function update(Request $request,$id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'city' => 'required',
            'class_id' => 'required',
        ]);

        $student = Student::find($id);

        $student->name = $request->input('name');
        $student->dob = $request->input('dob');
        $student->city = $request->input('city');
        $student->class_id = $request->class_id;

        $student->save();

        return redirect()->route('student_edit',$id);

    }

    public function delete($id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $student = Student::find($id);

        $student->delete();


        return redirect()->route('home');

    }
}
