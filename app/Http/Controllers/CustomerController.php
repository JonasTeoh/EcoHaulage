<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Permission;

class CustomerController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $customer = Customer::sortable()->get();
        return view('customer.index', compact('customer'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Customer::create($input);
        return redirect('customer')->with('flash_message', 'Customer Added!');
    }

    public function export()
    {
        return Excel::download(new CustomersExport, 'customer_list.xlsx');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('customer')->with('flash_message', 'Customer deleted!');
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customer.show')->with('customer', $customer);
    }

    public function details($id)
    {
        $courseview = Customer::find($id);
        return view('customer.details')->with('courseview', $courseview);
    }


    public function edit($id)
    {

        $customer = Customer::find($id);

        return view('customer.edit', compact('customer'))->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $course = Customer::find($id);


        $course->update($input);

        return redirect('customer')->with('flash_message', 'Customer Updated!');
    }

    /*
    public function downloadPDF(){
        $data = Course:: all();
        view()->share('course', $data);
        $pdf = Pdf::loadView('pdf_course', compact('data'));

        return $pdf->download('invoice.pdf');

      }

    public function singlePDF($id){

        $course = Course:: find($id);
        view()->share('course', $course);
        $pdf = Pdf::loadView('pdf_single_course', compact('course'));

        return $pdf->download('invoice.pdf');

      }
   */
}
