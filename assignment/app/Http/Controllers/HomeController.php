<?php

namespace App\Http\Controllers;

use App\ClassMaster;
use App\Parents;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('classMaster','parents')->get();

        $data = array(
            'filter' => 'All Students',
            'students' => $students
        );


        return view('home')->with($data);
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');

        if($filter == 'All Students'){
            return redirect('home');
        }
        else{
            if($filter == 'Older than 18'){


                $students = Student::where('dob','<=', Carbon::now()->subYear(18) )->get();


                $data = array(
                    'filter' => 'Older than 18',
                    'students' => $students
                );

                return view('home')->with($data);
            }
            else if($filter == 'Class 8 in 2010'){

                $students = Student::whereHas('classMaster', function ($q){
                    $q->where('name', '=', 'Class 8')
                    ->where('year','=','2010');
                })->get();

                $data = array(
                    'filter' => 'Class 8 in 2010',
                    'students' => $students
                );

                return view('home')->with($data);

            }
            else if ($filter == 'Older than 16 and who have parents older than 50'){

                $students = Student::where('dob','<=', Carbon::now()->subYear(16) )
                    ->whereHas('parents',function($q){
                        $q->where('dob', '<=', Carbon::now()->subYear(50));
                })->get();

                $data = array(
                    'filter' => 'Older than 16 and who have parents older than 50',
                    'students' => $students
                );

                return view('home')->with($data);

            }
        }
    }


}
