<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index', compact('banner'));
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
            'foto' => 'required|file|mimes:jpeg,jpg,png,webp',
        ],[
            'deskripsi' => 'Insert deksripsi',
            'foto' => 'Insert Image',
            'foto.mimes' => 'Image Must Be jpeg, jpg, png, webp',
        ]);
        try{
            $banner = new Banner();
            $banner->deskripsi = $request->deskripsi;
            if($request->hasFile('foto'))
            {
                $fotoBanner = 'Banner'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotoBanner);
                $banner->foto = $fotoBanner;
                $banner->save();
            }
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/banner')->with('success','Data Has Been Created');
        }catch (Throwable $e) {

            return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
