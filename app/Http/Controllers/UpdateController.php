<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $update = Update::latest()->get();
        return view('admin.update.index', compact('update'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.update.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|file|mimes:jpeg,jpg,png,webp',
            'judul_update' => 'required',
            'isi_berita' => 'required',
        ],[
            'foto' => 'Insert Image',
            'foto.mimes' => 'Image Must Be jpeg, jpg, png, webp',
            'judul_update' => 'Insert Title Update',
            'isi_berita' => 'Insert Topic Update',
        ]);

        try {
            $newUpdate = new Update();
            $newUpdate->judul_update = $request->judul_update;
            $newUpdate->isi_berita = $request->isi_berita;
    
            if($request->hasFile('foto'))
            {
                $fotoUpdate = 'gambar'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotoUpdate);
                $newUpdate->foto = $fotoUpdate;
                $newUpdate->save();
            }
    
           $newUpdate->save();
            // Artikel::create($request->all());
            return redirect('/admin/update')->with('success','Data Artikel Berhasil Di Tambahkan');
          } catch (Exception $e) {
          
              return redirect()->back()->with('error','Data Tidak Bisa Disimpan!', $e);
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $updateEdit = Update::findorfail($id);
        return view('admin.update.edit', compact('updateEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'foto' => '|file|mimes:jpeg,jpg,png,webp',
        ],[
            'foto.mimes' => 'Image Harus jpeg, jpg, png, webp',
        ]);

        
        try {
            $editUpdate = Update::findOrfail($id);
            if($request->hasFile('foto'))
            {
                $fotoUpdate = 'gambar'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img', $fotoUpdate);
                $editUpdate->foto = $fotoUpdate;
                $editUpdate->save();
    
                $editUpdate->update([
                    'judul_update' => $request->judul_update,
                    'isi_berita' => $request->isi_berita,
                ]);
            }else{
                $editUpdate->update([
                    'judul_update' => $request->judul_update,
                    'isi_berita' => $request->isi_berita,
                ]);
            }
            return redirect('/admin/update')->with('success','Data Artikel Berhasil Diupdate');
          
          } catch (Exception $e) {
          return redirect()->back()->with('error', 'Data Tidak Bisa Disimpan!', $e);
                    
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $update = Update::findorfail($id);
        File::delete('img/'.$update->foto);
        $update->delete();

        return redirect('/admin/update');
    }
}
