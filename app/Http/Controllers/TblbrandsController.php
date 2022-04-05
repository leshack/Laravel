<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brands;

class TblbrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createbrands()
    {

        return view ('Admin.brands.createbrands');
    }
    public function managebrands()
    {
        $brands = Brands::all();
        return view ('Admin.brands.managebrands', [
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'BrandName' => ['required', 'string', 'max:255'],

        ]);
        $brand = new Brands();

        $brand->BrandName = $request->get('BrandName');
        $brand->save();

        return back()->with('success', 'Brand successfully created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brands::findOrFail($id);
        return view('Admin.brands.updatebrands')
        ->with('brand', $brand);
        //  or
        //  return view('Admin.brands.updatebrands')
        // ->with('brand', Brands::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'BrandName' => ['required', 'string', 'max:255'],


        ]);
            Brands::whereId($id)->update($validatedData);

        return back()->with('success', 'Brand successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Brands::find($id)->delete();
        return redirect()->route('admin.brandsmanage')->with('success', 'Brand successfully deleted');
    }
}
