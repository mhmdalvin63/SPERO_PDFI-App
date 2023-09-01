<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $tipe = Type::where('id_user', $user)->get();
        return view('admin.tipe.index', compact('tipe'));   
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
            'nama_tipe' => 'required',
        ],[
            'nama_tipe' => 'Insert Type Name',
        ]);

        try {
            $user = Auth::user()->id;
            $newTipe = new Type();
            $newTipe->nama_tipe = $request->nama_tipe;
            $newTipe->id_user = $user;
    
            
    
           $newTipe->save();
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/cabang/tipe');
          } catch (Exception $e) {
          
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_tipe' => 'required',
        ],[
            'nama_tipe' => '',
        ]);

        try {
            $user = Auth::user()->id;
            $editTipe = Type::find($id);
            $editTipe->update([
                'nama_tipe' => $request->nama_tipe,
                'id_user' => $user,
            ]);
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/cabang/tipe');
          } catch (Throwable $e) {
          
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type, $id)
    {
        $tipe = Type::find($id);
        $tipe->delete();
        return redirect('/cabang/tipe')->with('success','Type Has Been Deleted');
    }
}
