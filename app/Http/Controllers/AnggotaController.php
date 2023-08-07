<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::latest()->get();
        return view('admin.anggota.index', compact('anggota'));
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
            'nama_anggota' => 'required',
        ],[
            'nama_anggota' => 'Insert Topic Update',
        ]);

        try {
            $newAnggota = new Anggota();
            $newAnggota->nama_anggota = $request->nama_anggota;
    
            
    
           $newAnggota->save();
            // Artikel::create($request->all());
            return redirect('/admin/anggota')->with('success','Data Artikel Berhasil Di Tambahkan');
          } catch (Exception $e) {
          
              return redirect()->back()->with('error','Data Tidak Bisa Disimpan!', $e);
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_anggota' => 'required',
        ],[
            'nama_anggota' => '',
        ]);

        try {
            $newAnggota = Anggota::findorfail($id);
            $newAnggota->update([
                'nama_anggota' => $request->nama_anggota
            ]);
            // Artikel::create($request->all());
            return redirect('/admin/anggota')->with('success','Data Artikel Berhasil Di Tambahkan');
          } catch (Exception $e) {
          
              return redirect()->back()->with('error','Data Tidak Bisa Disimpan!', $e);
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota, $id)
    {
        $anggota = Anggota::findorfail($id);
        $anggota->delete();
        return redirect('/admin/anggota');
    }
}
