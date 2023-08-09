<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\Type;
use App\Models\Tiket;
use App\Models\Agenda;
use App\Models\Anggota;
use App\Models\TypeAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda = Agenda::all();
        return view('admin.agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = Anggota::all();
        $tipe = Type::all();
        return view('admin.agenda.create', compact('anggota', 'tipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|file|mimes:jpeg,jpg,png,webp',
            'judul_agenda' => 'required',
            'deskripsi' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
            'id_anggota' => 'required',
            'status_event' => 'required',
        ],[
            'foto' => 'Insert Image',
            'foto.mimes' => 'Image Must Be jpeg, jpg, png, webp',
            'judul_agenda' => 'Insert Title Update',
            'deskripsi' => 'Insert Topic Update',
            'start_date' => 'Insert Start Date',
            'end_date' => 'Insert End Date',
            'location' => 'InsertLocation Event',
            'id_anggota' => 'Insert Organizer',
            'status_event' => 'Insert Event Status',
        ]);

        DB::beginTransaction();
        try {
            $newAgenda = new Agenda();
            $newAgenda->judul_agenda = $request->judul_agenda;
            $newAgenda->deskripsi = $request->deskripsi;
            $newAgenda->start_date = $request->start_date;
            $newAgenda->end_date = $request->end_date;
            $newAgenda->location = $request->location;
            $newAgenda->id_anggota = $request->id_anggota;
            $newAgenda->status_event = $request->status_event;
    
            if($request->hasFile('foto'))
            {
                $fotoAgenda = 'gambar'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img/', $fotoAgenda);
                $newAgenda->foto = $fotoAgenda;
                $newAgenda->save();
            }
    
           $newAgenda->save();  
           
        //    dd($request->tipe_id);
           
           foreach ($request->tipe_id as $newPivot) {
               $newPivotType = new TypeAgenda();
               $newPivotType->id_agenda = $newAgenda->id;
               $newPivotType->id_type  = $newPivot;
               $newPivotType->save();
           }
           if($request->status_event == 'Buy'){
               if($request->nama_tiket){
                foreach($request['nama_tiket'] as $a => $b){
                    $array2 = array(
                        'id_agenda' => $newAgenda->id,
                        'nama_tiket' => $request['nama_tiket'][$a],
                        'harga_tiket' => $request['harga_tiket'][$a],
                    );
    
                    Tiket::create($array2);
                    }
                }
           }
           
            DB::commit();
            return redirect('/admin/agenda')->with('success','Data Artikel Berhasil Di Tambahkan');
            
          } catch (Exception $e) {

            DB::rollBack();
            return redirect()->back()->with('error','Data Tidak Bisa Disimpan!', $e);
          
          }

    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anggota = Anggota::all();
        $tipe = Type::all();
        $agenda = Agenda::findorfail($id);
        return view('admin.agenda.edit', compact('agenda', 'anggota', 'tipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        // dd($request);
        try{
            DB::beginTransaction();
            $editAgenda = Agenda::findorfail($id);
            if($request->hasFile('foto'))
            {
                $fotoUpdate = 'gambar'.rand(1,99999).'.'.$request->foto->getClientOriginalExtension();
                $request->file('foto')->move(public_path().'/img', $fotoUpdate);
                $editUpdate->foto = $fotoUpdate;
                $editUpdate->save();
               
            }

            $editAgenda->update([
                'judul_agenda' => $request->judul_agenda,
                'deskripsi' => $request->deskripsi,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,
                'id_anggota' => $request->id_anggota,
                'status_event' => $request->status_event,
            ]);
        
            $editAgenda->type()->sync($request->tipe_id);
            
            if($request->status_event == 'Buy'){
                if($request->nama_tiket){
                foreach($request['nama_tiket'] as $a => $b){
                    $array2 = array(
                        'id_agenda' => $editAgenda->id,
                        'nama_tiket' => $request['nama_tiket'][$a],
                        'harga_tiket' => $request['harga_tiket'][$a],
                    );
                    
                    Tiket::create($array2);
                    }
                }
            }else{
                $tiket = Tiket::where('id_agenda', $editAgenda->id)->delete();
            }
            
            DB::commit();
            return redirect('/admin/agenda')->with('success','Data Artikel Berhasil Di Edit');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agenda = Agenda::findorfail($id);
        File::delete('img/'.$agenda->foto);
        $agenda->delete();

        return redirect('/admin/agenda');
    }
}