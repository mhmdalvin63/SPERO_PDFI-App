<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $bidang = Bidang::latest()->get();
        return view('admin.bidang.index', compact('bidang'));
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
            'deskripsi' => 'required',
        ],[
            'nama' => 'Insert Nama Bidang',
            'deskripsi' => 'Insert Deskripsi Bidang',
        ]);

        try {
            $newBidang = new Bidang();
            $newBidang->nama = $request->nama;
            $cleanedText = strip_tags($request->deskripsi);
            $newBidang->deskripsi = $cleanedText;
    
           $newBidang->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/bidang');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bidang $bidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $editBidang = Bidang::find($id);
            $editBidang->nama = $request->nama;
            $cleanedText = strip_tags($request->deskripsi);
            $editBidang->deskripsi = $cleanedText;
    
           $editBidang->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/admin/bidang');
          } catch (Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidang = Bidang::find($id);
        $bidang->delete();
        return redirect('/admin/bidang');
    }
}
