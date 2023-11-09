<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Bidang;
use App\Models\Posisi;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = Organisasi::with('posisi')->get()->sortBy('posisi.tingkatan');
        return view('admin.organisasi.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kota = City::all();
        $bidang = Bidang::all();
        $posisi = Posisi::orderBy('tingkatan')->get();
        return view('admin.organisasi.create', compact('kota', 'bidang', 'posisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'domisili' => 'required',
            'id_posisi' => 'required',
        ],[
            'nama' => 'Input Nama Dan Gelar',
            'domisili' => 'Input Domisili',
            'id_posisi' => 'Input Posisi',
        ]);

        $newOrganisasi = new Organisasi();
        $newOrganisasi->id_posisi = $request->id_posisi;
        $newOrganisasi->domisili = $request->domisili;
        $newOrganisasi->nama = $request->nama;
        $newOrganisasi->id_bidang = $request->id_bidang;

        if($request->hasFile('foto'))
            {
                $fotoprofil = 'profil'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotoprofil);
                $newOrganisasi->foto = $fotoprofil;
                $newOrganisasi->save();
            }
        $newOrganisasi->save();
        Alert::success('Success', 'Data Created Successfully');
        return redirect('/admin/kepengurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kota = City::all();
        $bidang = Bidang::all();
        $posisi = Posisi::orderBy('tingkatan')->get();
        $organisasi = Organisasi::find($id);
        return view('admin.organisasi.edit', compact('kota', 'organisasi', 'bidang', 'posisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $editOrganisasi = Organisasi::find($id);
        $editOrganisasi->id_posisi = $request->id_posisi;
        $editOrganisasi->domisili = $request->domisili;
        $editOrganisasi->nama = $request->nama;
        if($request->tingkatan == 4){
            $editOrganisasi->foto = NULL;
            $editOrganisasi->id_bidang = $request->id_bidang;
        }else{
            if($request->hasFile('foto'))
            {
                $fotoprofil = 'profil'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotoprofil);
                $editOrganisasi->foto = $fotoprofil;
                $editOrganisasi->save();
            }
            $editOrganisasi->id_bidang = NULL;
        }

        
        $editOrganisasi->save();
        
        Alert::success('Success', 'Data Updated Successfully');
        return redirect('/admin/kepengurusan/');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $organisasi = Organisasi::find($id);
        $organisasi->delete();
        return redirect('/admin/kepengurusan/');
    }
}
