<?php

namespace App\Http\Controllers;

use App\Models\Dewan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DewanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dewans = Dewan::all();
        // dd($dewan);
        return view('admin.dewan.index', compact('dewans'));
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
            'nama' => 'Insert Nama Dewan',
        ]);

        try {
            $newDewan = new Dewan();
            $newDewan->nama = $request->nama;
    
           $newDewan->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/dewan');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dewan $dewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dewan $dewan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $editDewan = Dewan::find($id);
            $editDewan->nama = $request->nama;
    
           $editDewan->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/admin/dewan');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $dewan = Dewan::find($id);
        $dewan->delete();

        return back();
    }
}
