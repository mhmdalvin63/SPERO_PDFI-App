<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisi = Posisi::latest()->get();
        return view('admin.posisi.index', compact('posisi'));
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
            'posisi' => 'required',
            'tingkatan' => 'required',
        ],[
            'posisi' => 'Insert Posisi',
            'tingkatan' => 'Insert Tingkatan',
        ]);

        try {
            $newPosisi = new Posisi();
            $newPosisi->posisi = $request->posisi;
            $newPosisi->tingkatan = $request->tingkatan;
    
           $newPosisi->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/posisi');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Posisi $posisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posisi $posisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $editPosisi = Posisi::find($id);
            $editPosisi->posisi = $request->posisi;
            $editPosisi->tingkatan = $request->tingkatan;
    
           $editPosisi->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/admin/posisi');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posisi = Posisi::find($id);
        $posisi->delete();
        return redirect('/admin/posisi');
    }
}
