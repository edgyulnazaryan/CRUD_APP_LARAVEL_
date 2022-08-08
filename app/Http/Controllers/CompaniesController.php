<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(3);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {

        $path = public_path('tmp/uploads');

        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('logo');

        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());

        $this->logo = $fileName;

        $file->move($path, $fileName);


        Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $this->logo,
        ]);

        return redirect()->route('companies.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Companies::find($id);

        return view('companies.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companies = Companies::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);


        if ($request->hasFile('logo')) {

            $path = public_path('tmp/uploads');

            $file = $request->file('logo');

            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());

//            $this->logo = $fileName;
            $request->request->add(['logo' => $fileName]); //add request

            $file->move($path, $fileName);


        }


        try {


            $companies->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $fileName ?? $companies->logo,
            ]);
            return redirect()->route('companies.index');

        } catch (\Throwable $th)
        {
            dd($th);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id);
        $companies->delete();
        return redirect('/companies');
    }
}
