<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index',compact('companies'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validated = $request->validated();

        $logoURL = $this->storeImage($request);

        $company = new Company([
            'name' => $request->get('name'),
            'logo' => $logoURL,
            'email' => $request->get('email'),
            
        ]);
        
        $company->save();
        return redirect('/admin/companies')->with('success', 'Company saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('admin.company.view', compact('company'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $validated = $request->validated();

        $rec = Company::find($id);
        $rec->name = $request->get('name');
        $rec->email = $request->get('email');
        if($request->file('logo')) {
            $rec->logo = $this->storeImage($request);
        }
        $rec->save();
        return redirect('/admin/companies')->with('success', 'Company Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rec = Company::find($id);
        $rec->delete();        
        return redirect('/admin/companies')->with('success', 'Company deleted!');
    }

    protected function storeImage(Request $request) {
        $path = $request->file('logo')->store('public/logos');
        return substr($path, strlen('public/'));
      }
}
