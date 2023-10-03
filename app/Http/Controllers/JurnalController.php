<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnal = Jurnal::latest()->get();
        return view('admin.jurnal.index', compact('jurnal'));
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
            'judul_jurnal' => 'required',
            'link_jurnal' => 'required',
            'foto' => 'required|file|mimes:jpeg,jpg,png,webp',
        ],[
            'judul_jurnal' => 'Insert Title',
            'link_jurnal' => 'Insert Link',
            'foto' => 'Insert Image',
            'foto.mimes' => 'Image Must Be jpeg, jpg, png, webp'
        ]);

        
            $newJurnal = new Jurnal();
            $newJurnal->judul_jurnal = $request->judul_jurnal;
            $newJurnal->link_jurnal = $request->link_jurnal;

            if($request->hasFile('foto'))
            {
                $fotojurnal = 'Jurnal'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotojurnal);
                $newJurnal->foto = $fotojurnal;
                $newJurnal->save();
            }
    
           $newJurnal->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/jurnal');
          
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul_jurnal' => '',
            'link_jurnal' => '',
            'foto' => 'file|mimes:jpeg,jpg,png,webp',
        ],[
            'judul_jurnal' => '',
            'link_jurnal' => '',
            'foto' => '',
            'foto.mimes' => 'Image Must Be jpeg, jpg, png, webp'
        ]);

        
            $editjurnal =  Jurnal::find($id);
            $editjurnal->judul_jurnal = $request->judul_jurnal;
            $editjurnal->link_jurnal = $request->link_jurnal;

            if($request->hasFile('foto'))
            {
                $fotojurnal = 'Jurnal'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotojurnal);
                $editjurnal->foto = $fotojurnal;
                $editjurnal->save();
            }
    
           $editjurnal->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/jurnal');
          
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurnal = Jurnal::find($id);
        $jurnal->delete();
        return redirect('/admin/jurnal');
    }
}
