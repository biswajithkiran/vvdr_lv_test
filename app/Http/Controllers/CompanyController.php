<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrCompany = Company::all();
        return view('admin.company.index', ['arrCompany' => $arrCompany]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $fileName       = '';
        $this->validate($request, [
                              'name'    => 'required',
                              'email'   => 'required|email|unique:companies',  
                              'logo'    => 'sometimes|required|mimes:png,jpg,jpeg|max:2048',                            
                                ]);
        if($request->logo)
        {
            $fileName   = time().'.'.$request->logo->extension();
            $file       = $request->file('logo'); 
            //$request->logo->move(public_path('uploads/company'), $fileName);            
            Storage::disk('local')->put('public/company/'.$fileName, file_get_contents($file));
        }
        $objC               = new Company();
        $objC->name         = $request->name;
        $objC->email        = $request->email;
        $objC->website      = $request->website;               
        $objC->logo         = $fileName;        
        $objC->save();
        $message            = 'New company created successfully';
        return redirect()->route('companies.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {        
        $fileName       = '';
        $this->validate($request, [
                              'name'    => 'required',                                
                              'logo'    => 'sometimes|required|mimes:png,jpg,jpeg|max:2048',                            
                                ]);
        $arrCompany                 = Company::find($company->id);
        if($request->logo)
        {
            $fileName   = time().'.'.$request->logo->extension();
            $file       = $request->file('logo'); 
            //$request->logo->move(public_path('uploads/company'), $fileName);            
            Storage::disk('local')->put('public/company/'.$fileName, file_get_contents($file));
            $arrCompany->logo           = $fileName;
        }       
        $arrCompany->name           = $request->name;
        $arrCompany->website        = $request->website;        
        //$arrCompany->logo           = $request->cid;                
        $arrCompany->save();
        $message                    = 'Details updated successfully';
        return redirect()->route('companies.index')->with('success', $message); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company    = Company::find($company->id);
        $company->delete();
        $message    = 'Record deleted successfully';
        return redirect()->route('companies.index')->with('success', $message); 
    }
}
