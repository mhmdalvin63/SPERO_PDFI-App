<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $anggota = Anggota::where('id_user', $user)->get();
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
            $user = Auth::user()->id;
            $newAnggota = new Anggota();
            $newAnggota->nama_anggota = $request->nama_anggota;
            $newAnggota->id_user = $user;
    
            
    
           $newAnggota->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect()->back();
          } catch (Throwable $e) {
          
              return redirect()->back()->with('error', $e->getMessage());
          
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
            $user = Auth::user()->id;
            $newAnggota = Anggota::find($id);
            $newAnggota->update([
                'nama_anggota' => $request->nama_anggota,
                'id_user' => $user
            ]);
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Updated Successfully');
            return redirect()->back();
          } catch (Throwable $e) {
          
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return redirect()->back()->with('success','Data Has Been Deleted');
    }
}
