<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koor = Koordinator::all();
        return view('admin.koordinator.index', compact('koor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
        ],[
            'nama' => 'Insert Nama Koordinator',
        ]);

        try {
            $newKoor = new Koordinator();
            $newKoor->nama = $request->nama;
    
           $newKoor->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/koordinator');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Koordinator $koordinator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koordinator $koordinator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $editKoor = Koordinator::find($id);
            $editKoor->nama = $request->nama;
    
           $editKoor->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/admin/koordinator');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $koor = Koordinator::find($id);
        $koor->delete();

        return back();
    }
}
