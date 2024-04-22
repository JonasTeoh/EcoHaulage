<?php

namespace App\Http\Controllers;

use Sortable;
use App\Models\Course;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CoursesExport;
use App\Models\CourseMaterial;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class CourseController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:import-list|import-create|import-edit|import-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:import-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:import-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:import-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new CoursesExport, 'ImportList.xlsx');
    }

    public function index()
    {
        $course = Course::sortable()->get();
        return view('course.index', compact('course'));
    }

    public function campus()
    {
        $courseview = Course::all();
        return view('course.campus', compact('courseview'));
    }

    public function downloadPDF()
    {
        $data = Course::all();
        view()->share('course', $data);
        $pdf = Pdf::loadView('pdf_import', compact('data'));

        return $pdf->download('ROT_import.pdf');

    }

    public function singlePDF($id)
    {
        $course = Course::find($id);
        view()->share('course', $course);
        $pdf = Pdf::loadView('pdf_single_course', compact('course'));

        return $pdf->download('ROT_import.pdf');
    }

    public function singleCN($id)
    {
        $course = Course::find($id);
        view()->share('course', $course);
        $pdf = Pdf::loadView('cn_single_course', compact('course'));

        return $pdf->download('CN_import.pdf');
    }

    public function create()
    {
        $customers = Customer::all();
        return view('course.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $course = Course::create($input);

        if ($request->has('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/imgs');
            $image->move($dest, $reImage);
            // Save Data
            $course->img_src = $reImage;
            $course->save();
        }
        return redirect('course')->with('flash_message', 'Import Added!');
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('course.show')->with('course', $course);
    }

    public function details($id)
    {
        $courseview = Course::find($id);
        return view('course.details')->with('courseview', $courseview);
    }

    public function edit($id)
    {

        $course = Course::find($id);
        $lesson = CourseMaterial::pluck('lesson', 'lesson')->all();

        return view('course.edit', compact('course', 'lesson'))->with('course', $course);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $course = Course::find($id);
        if ($request->user()->hasRole('driver')) {
            $course->update(
                [
                    'status' => $input['status'],
                ]
            );
        } else {
            $course->update($input);
        }

        if ($request->has('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/imgs');
            $image->move($dest, $reImage);
            // Save Data
            $course->img_src = $reImage;
            $course->save();
        }

        return redirect('course')->with('flash_message', 'Import Updated!');
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('course')->with('flash_message', 'Import deleted!');
    }

    public function upload()
    {

    }
}
