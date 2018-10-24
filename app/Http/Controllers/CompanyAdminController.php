<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;

class CompanyAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminPages.addcompany');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'companyName' => 'required',
            'companyEmail' => 'required',
            'companyPhone' => 'required',

            'companyMobile' => 'required',
            'companyAddress' => 'required',
            'companyDescription' => 'required',

            'companyWebLink' => 'required',
            'companyResPerson' => 'required',
            'companyPhoneRP' => 'required',
            'companyEmailRP' => 'required',
        ]);
         //Create company
         $company = new Company;
         $company->companyName=$request->input('companyName');
         $company->companyEmail=$request->input('companyEmail');
         $company->companyPhone=$request->input('companyPhone');
         $company->companyMobile=$request->input('companyMobile');
         $company->companyAddress=$request->input('companyAddress');
         $company->companyDescription=$request->input('companyDescription');
         $company->companyWebLink=$request->input('companyWebLink');
         $company->companyResPerson=$request->input('companyResPerson');
         $company->companyPhoneRP=$request->input('companyPhoneRP');
         $company->companyEmailRP=$request->input('companyEmailRP');
         $company->save();
 
         return redirect('/addcompany')->with('success', 'Company created');
    }
}
