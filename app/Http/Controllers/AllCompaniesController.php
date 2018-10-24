<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Company;
use App\CompanyEvent;


class AllCompaniesController extends Controller
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

        $companies = Company::all();
        return view('adminPages.allcompanies', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_company)
    {
        $company = Company::find($id_company);
        $oldcompanies = Company::all();
        return view('adminPages.show_companies', ['oldcompanies' => $oldcompanies])->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_company)
    {
        $id_company = Company::find($id_company);
        $ab = 2;
        return view('adminPages.edit_company')->with('id_company', $id_company)->withAb($ab);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_company)
    {
       
        $company = Company::find($id_company);
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

        return redirect('/allcompanies')->with('success', 'Company Updated');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_company)
    {
        $company = Company::find($id_company);
        $companyevent = CompanyEvent::all();
        $included = CompanyEvent::where('id_company', $id_company)->first();

        if($included) {
            return back()->with('error', 'This company is participating in one or more events and therefore cant be deleted');
       
        }else{
            $company->delete();
        return redirect('/allcompanies')->with('success', 'Company removed');
        }
    }
}
