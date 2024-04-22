<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;
use Image;

class CourseMaterialController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $data = CourseMaterial::orderBy('id', 'desc')->paginate(5);

        return view('coursematerials.index', compact('data'));
    }

    public function downloadPDF()
    {
        $data = CourseMaterial::all();
        view()->share('course_material', $data);
        $pdf = Pdf::loadView('pdf_course_material', compact('data'));

        return $pdf->download('invoice.pdf');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('coursematerials.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        CourseMaterial::create($input);
        return redirect('coursematerials')->with('flash_message', 'Course Addedd!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $course_material = CourseMaterial::find($id);

        return view('coursematerials.show', compact('course_material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $course_material = CourseMaterial::find($id);

        return view('coursematerials.edit', compact('course_material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $course_material = CourseMaterial::find($id);
        $input = $request->all();
        $course_material->update($input);
        return redirect('coursematerials')->with('flash_message', 'Lessons Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        CourseMaterial::find($id)->delete();

        return redirect()->route('coursematerials.index')
            ->with('success', 'Lessons deleted successfully.');
    }
    public function showUsers()
    {
        $course_material = CourseMaterial::all();
        return view('index', compact('course_material'));
    }


}











































































