<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Update;
use App\Models\FotoUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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
        $tag = Tag::all();
        return view('admin.update.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_update' => 'required',
            'isi_berita' => 'required',
            'jenis_berita' => 'required',
        ],[
            'foto.mimes' => 'Image Must Be jpeg, jpg, png, webp',
            'judul_update' => 'Insert Title Update',
            'isi_berita' => 'Insert Topic Update',
            'jenis_berita' => 'Select Update Type',
        ]);

        try {
            $newUpdate = new Update();
            $cleanedText = strip_tags($request->isi_berita);
            $newUpdate->judul_update = $request->judul_update;
            $newUpdate->isi_berita = $cleanedText;
            $newUpdate->jenis_berita = $request->jenis_berita;
           $newUpdate->save();

           $newUpdate->tag()->attach($request->id_tag);

           if($request->has('foto')){
            foreach($request->file('foto') as $image){
                $image2 = 'update'.rand(1,999).$image->getClientOriginalExtension();
                $image->move(public_path().'/img/', $image2);
                FotoUpdate::create([
                    'id_update' => $newUpdate->id,
                    'foto' => $image2,
                    ]);
                }
            }
            // Artikel::create($request->all());
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/update');
          } catch (Exception $e) {
          
              return redirect()->back()->with('error','Data Tidak Bisa Disimpan!', $e->getMessage());
          
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
        $tag = Tag::all();
        return view('admin.update.edit', compact('updateEdit', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // // dd($request);
        $this->validate($request,[
            'judul_update' => '',
            'isi_berita' => '',
            'jenis_berita' => '',
        ]);

        
        // try {

            $editUpdate = Update::find($id);
            $cleanedText = strip_tags($request->isi_berita);
            $editUpdate->judul_update =  $request->judul_update;
            $editUpdate->isi_berita =  $cleanedText;
            $editUpdate->jenis_berita =  $request->jenis_berita;
            $editUpdate->save();


            $foto = FotoUpdate::where('id_update', $editUpdate->id)->first();
            if($request->hasFile('foto'))
            {
                if($foto){
                    File::delete('img/'.$foto->foto);
                }
                $fotodelete = FotoUpdate::where('id_update', $editUpdate->id)->delete();
                foreach($request->file('foto') as $image){
                    $image2 = 'update'.rand(1,999).$image->getClientOriginalExtension();
                    $image->move(public_path().'/img/', $image2);
                    FotoUpdate::create([
                        'id_update' => $editUpdate->id,
                        'foto' => $image2,
                        ]);
                }
            }
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/admin/update');
          
        //   } catch (Exception $e) {
        //     Alert::error('Error', $e->getMessage());
        //   return redirect()->back()->with('error', $e->getMessage());
                    
        //   }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $update = Update::findorfail($id);
        $foto = FotoUpdate::where('id_update', $update->id)->first();
        if($foto){
            File::delete('img/'.$foto->foto);
        }
        $update->delete();

        return redirect()->back();
    }

    public function deleteimage($id){
        $image = FotoUpdate::find($id);
        File::delete('img/'.$image->foto);
        $image->delete();

        return response()->json([
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }   
}
