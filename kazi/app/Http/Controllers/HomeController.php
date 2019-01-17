<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function students()
    {
        //get all students
        $students = User::where('role', 'student')
                        ->latest()
                        ->paginate(10);
        //count sudents number
        $count = $students->count();
        //return view and pass students and count
        return view('students', compact('students', 'count'));
    }

    public function teachers()
    {
        //get all teachers
        $teachers = User::where('role', 'teacher')
                        ->latest()
                        ->paginate(10);
        //count teachers number
        $count = $teachers->count();
        //return view and pass teachers and count
        return view('teachers', compact('teachers', 'count'));
    }

}
