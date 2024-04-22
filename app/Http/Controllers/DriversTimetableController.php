<?php

namespace App\Http\Controllers;

use Sortable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\CoursesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DriversTimetable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class DriversTimetableController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:import-list|import-create|import-edit|import-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:import-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:import-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:import-delete', ['only' => ['destroy']]);
    }

    public function export()
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }

    public function index()
    {
        $course = DriversTimetable::sortable()->get();
        $user = User::find(Auth::user()->id);
        if ($user->hasRole('driver')) {
            return redirect(url('/driver/' . auth()->user()->driver->id . '/schedules/index'));
        }
        return view('driver.index', compact('course'));
    }

    public function campus()
    {
        $courseview = DriversTimetable::all();
        return view('driver.campus', compact('courseview'));
    }

    public function downloadPDF()
    {
        $data = DriversTimetable::all();
        view()->share('course', $data);
        $pdf = Pdf::loadView('pdf_course', compact('data'));

        return $pdf->download('invoice.pdf');

    }

    public function create()
    {
        $users = User::role('driver')->orderBy('id', 'desc')->paginate(5);
        $users = $users->filter(function ($user, $key) {
            return !$user->assignedDriver();
        });
        return view('driver.create', compact('users'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        DriversTimetable::create($input);
        // dd($input);
        return redirect('driver')->with('flash_message', 'Course Addedd!');
    }

    public function show($id)
    {
        $courseview = DriversTimetable::find($id);
        return view('driver.show')->with('courseview', $courseview);
    }

    public function details($id)
    {
        $courseview = DriversTimetable::find($id);
        return view('driver.details')->with('courseview', $courseview);
    }

    public function edit($id)
    {
        $course = DriversTimetable::find($id);
        return view('driver.edit', compact('course'))->with('course', $course);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $course = DriversTimetable::find($id);


        $course->update($input);

        return redirect('driver')->with('flash_message', 'Courses Updated!');
    }

    public function destroy($id)
    {
        DriversTimetable::destroy($id);
        return redirect('driver')->with('flash_message', 'Courses deleted!');
    }
}
