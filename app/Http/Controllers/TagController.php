<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tag::latest()->get();
        return view('admin.tag.index', compact('tag'));
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
            'tag_name' => 'required',
            'deskripsi' => 'required',
        ],[
            'tag_name' => 'Insert Tag Name',
            'deskripsi' => 'Insert Description',
        ]);

        try {
            $newTag = new Tag();
            $newTag->tag_name = $request->tag_name;
            $newTag->deskripsi = $request->deskripsi;
    
           $newTag->save();
            // Artikel::create($request->all());
            return redirect('/admin/tag')->with('success','Data Artikel Berhasil Di Tambahkan');
          } catch (Exception $e) {
          
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tag_name' => 'required',
            'deskripsi' => 'required',
        ],[
            'tag_name' => '',
            'deskripsi' => '',
        ]);

        try {
            $editTag = Tag::findorfail($id);
            $editTag->update([
                'tag_name' => $request->tag_name,
                'deskripsi' => $request->deskripsi,
            ]);
            // Artikel::create($request->all());
            return redirect('/admin/tag')->with('success','Data Artikel Berhasil Di Tambahkan');
          } catch (Throwable $e) {
          
              return redirect()->back()->with('error', $e->getMessage());
          
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag = findorfail($id);
        $tag->delete();
        return redirect('/admin/tag')->with('don', 'Data Sudah Dihapus');
    }
}
