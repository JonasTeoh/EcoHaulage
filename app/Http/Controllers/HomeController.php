<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriversTimetable;

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
    public function home()
    {
        $course = DriversTimetable::sortable()->paginate(5);
        return view('home', compact('course'));
    }
}
