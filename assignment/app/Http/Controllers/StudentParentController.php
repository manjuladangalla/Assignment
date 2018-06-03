<?php

namespace App\Http\Controllers;

use App\Parents;
use App\Student;
use App\StudentParent;
use Illuminate\Http\Request;

use Gate;

class StudentParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($studentId=null,$parentId=null)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $students = Student::all();
        $parents = Parents::all();

        $data = array(
            'selectedStudent' => $studentId,
            'selectedParent' => $parentId,
            'students' => $students,
            'parents' => $parents,
        );
        return view('studentParent')->with($data);
    }

    public function save(Request $request)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404);
        }

        $validatedData = $request->validate([
            'student_id' => 'required',
            'parent_id' => 'required',
        ]);

        $studentId = $request->input('student_id');
        $parentId = $request->input('parent_id');

        $studentParent = StudentParent::where('student_id',$studentId)
            ->where('parent_id', $parentId)->get();

        if(!$studentParent->first()){

            $studentParent = new StudentParent();
            $studentParent->student_id = $studentId;
            $studentParent->parent_id = $parentId;

            $studentParent->save();

            return redirect()->route('student_parent_add',[$studentId,$parentId]);
        }

        return redirect()->route('student_parent_add');
    }

}
