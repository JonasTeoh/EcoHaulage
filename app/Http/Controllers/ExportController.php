<?php

namespace App\Http\Controllers;

use Sortable;
use App\Models\export;
use App\Exports\Exports;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;


class ExportController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function export()
    {
        return Excel::download(new Exports, 'courses.xlsx');
    }


    public function index()
    {
        $course = export::sortable()->get();
        return view('exports.index', compact('course'));
    }

    public function campus()
    {
        $courseview = export::all();
        return view('exports.campus', compact('courseview'));
    }




    public function downloadPDF()
    {
        $data = export::all();
        view()->share('course', $data);
        $pdf = Pdf::loadView('pdf_export', compact('data'));

        return $pdf->download('invoice.pdf');

    }


    public function singlePDF($id)
    {

        $item = export::find($id);
        view()->share('course', $item);
        $pdf = PDF::loadView('pdf_single_export', compact('item'));

        return $pdf->download('ROT_export.pdf');
    }

    public function singleCN($id)
    {

        $item = export::find($id);
        view()->share('course', $item);
        $pdf = PDF::loadView('cn_single_export', compact('item'));

        return $pdf->download('CN_export.pdf');
    }

    public function create()
    {
        $customers = Customer::all();
        return view('exports.create', compact('customers'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $course = export::create($input);
        if ($request->has('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/imgs');
            $image->move($dest, $reImage);
            // Save Data
            $course->img_src = $reImage;
            $course->save();
        }
        return redirect('exports')->with('flash_message', 'Course Addedd!');
    }


    public function show($id)
    {
        $courseview = export::find($id);
        return view('exports.show')->with('courseview', $courseview);
    }

    public function details($id)
    {
        $courseview = export::find($id);
        return view('exports.details')->with('courseview', $courseview);
    }


    public function edit($id)
    {

        $course = export::find($id);
        $lesson = CourseMaterial::pluck('lesson', 'lesson')->all();

        return view('exports.edit', compact('course', 'lesson'))->with('course', $course);
    }



    public function update(Request $request, $id)
    {
        $input = $request->all();
        $course = export::find($id);

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
        return redirect('exports')->with('flash_message', 'Courses Updated!');
    }


    public function destroy($id)
    {
        export::destroy($id);
        return redirect('exports')->with('flash_message', 'Courses deleted!');
    }


}
