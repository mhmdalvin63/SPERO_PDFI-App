<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\Type;
use App\Models\Tiket;
use App\Models\Agenda;
use App\Models\Anggota;
use Milon\Barcode\DNS2D;
use App\Models\Pendaftar;
use App\Models\FotoAgenda;
use App\Models\TypeAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $agenda = Agenda::where('id_user', $user)->get();
        return view('admin.agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->id;
        $tipe = Type::where('id_user', $user)->get();
        $anggota = Anggota::where('id_user', $user)->get();
        return view('admin.agenda.create', compact('anggota', 'tipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_agenda' => 'required',
            'deskripsi' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
            'id_anggota' => 'required',
            'status_event' => 'required',
            'link_gform' => 'required',
            'panduan' => 'required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'qris' => 'required|file|mimes:png,jpg,jpeg',
        ],[
            'judul_agenda' => 'Insert Title Update',
            'deskripsi' => 'Insert Topic Update',
            'start_date' => 'Insert Start Date',
            'end_date' => 'Insert End Date',
            'location' => 'Insert Location Event',
            'id_anggota' => 'Insert Organizer',
            'status_event' => 'Insert Event Status',
            'link_gform' => 'Insert Link GForm',
            'panduan' => 'Insert Panduan',
            'panduan.mimes' => 'File Must Be png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'qris' => 'Insert Qris',
            'qris.mimes' => 'File Must Be png,jpg,jpeg',
        ]);

        try {
            DB::beginTransaction();
            $user = Auth::user()->id;
            $newAgenda = new Agenda();
            $newAgenda->judul_agenda = $request->judul_agenda;
            $newAgenda->deskripsi = $request->deskripsi;
            $newAgenda->start_date = $request->start_date;
            $newAgenda->end_date = $request->end_date;
            $newAgenda->location = $request->location;
            $newAgenda->id_anggota = $request->id_anggota;
            $newAgenda->status_event = $request->status_event;
            $newAgenda->link_gform = $request->link_gform;
            $newAgenda->id_user = $user;
    
            if($request->hasFile('panduan'))
            {
                $filePanduan = 'Panduan'.rand(1,99999).'.'.$request->panduan->getClientOriginalExtension();
                $request->file('panduan')->move(public_path().'/file/', $filePanduan);
                $newAgenda->panduan = $filePanduan;
                $newAgenda->save();
            }
            if($request->hasFile('qris'))
            {
                $fileqris = 'qris'.rand(1,99999).'.'.$request->qris->getClientOriginalExtension();
                $request->file('qris')->move(public_path().'/img/', $fileqris);
                $newAgenda->qris = $fileqris;
                $newAgenda->save();
            }

            if($request->no_rek){
                $newAgenda->no_rek = $request->no_rek;
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
           if($request->has('foto')){
            foreach($request->file('foto') as $image){
                $image2 = 'agenda'.rand(1,999).$image->getClientOriginalExtension();
                $image->move(public_path().'/img/', $image2);
                FotoAgenda::create([
                    'id_agenda' => $newAgenda->id,
                    'foto' => $image2,
                    ]);
                }
            }
           
            DB::commit();
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/agenda')->with('success','Data Has Been Created');
            
        } catch (Throwable $e) {

            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
          
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $tipe = Type::where('id_user', $user)->get();
        $anggota = Anggota::where('id_user', $user)->get();
        $agenda = Agenda::find($id);
        return view('admin.agenda.edit', compact('agenda', 'anggota', 'tipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $editAgenda = Agenda::find($id);
            $user = Auth::user()->id;
            

            $editAgenda->judul_agenda = $request->judul_agenda;
            $editAgenda->deskripsi = $request->deskripsi;
            $editAgenda->start_date = $request->start_date;
            $editAgenda->end_date = $request->end_date;
            $editAgenda->location = $request->location;
            $editAgenda->id_anggota = $request->id_anggota;
            $editAgenda->status_event = $request->status_event;
            $editAgenda->link_gform = $request->link_gform;
            $editAgenda->id_user = $user;

            if($request->hasFile('panduan'))
            {
                    File::delete('file/'.$editAgenda->panduan);
                $filePanduan = 'Panduan'.rand(1,99999).'.'.$request->panduan->getClientOriginalExtension();
                $request->file('panduan')->move(public_path().'/file/', $filePanduan);
                $editAgenda->panduan = $filePanduan;
                $editAgenda->save();
            }
            if($request->hasFile('qris'))
            {
                File::delete('img/'.$editAgenda->qris);
                $fileqris = 'qris'.rand(1,99999).'.'.$request->qris->getClientOriginalExtension();
                $request->file('qris')->move(public_path().'/img/', $fileqris);
                $editAgenda->panduan = $fileqris;
                $editAgenda->save();
            }

            if($request->no_rek){
                $editAgenda->no_rek = $request->no_rek;
            }

            $editAgenda->save();

             
            $deletependaftar = Pendaftar::where('id_agenda', $editAgenda->id)->delete();
            
            if($request->status_event == 'Buy'){
                $tiket = Tiket::where('id_agenda', $editAgenda->id)->delete();
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
        
            $editAgenda->type()->sync($request->tipe_id);
            
            $foto = FotoAgenda::where('id_agenda', $editAgenda->id)->first();
            if($request->has('foto')){
                    File::delete('img/'.$foto->foto);
                $deleteimage = FotoAgenda::where('id_agenda', $editAgenda->id)->delete();
                    foreach($request->file('foto') as $image){
                        $image2 = 'agenda'.rand(1,9999).$image->getClientOriginalExtension();
                        $image->move(public_path().'/img/', $image2);
                        FotoAgenda::create([
                            'id_agenda' => $editAgenda->id,
                            'foto' => $image2,
                            ]);
                        }
                    }
            
            DB::commit();
            Alert::success('Success', 'Data Updated Successfully');
            return redirect('/admin/agenda');
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
        $agenda = Agenda::find($id);
        $foto = FotoAgenda::where('id_agenda', $agenda->id)->first();
        
        $agenda->delete();

        return redirect()->back()->with('success','Data Has Been Deleted');
    }

    public function search(Request $request){

        // dd($request);
        $pendaftar = Pendaftar::where('token', $request->token)->where('id_agenda', $request->id)->first();

        if(!$pendaftar){
            Alert::Error('Error', 'Qr Code Tidak Terdaftar Di Event ini');
            return redirect()->back();
        }else{
            Alert::success('Success', 'Qr Terdaftar di Event Ini');
            return redirect()->back();
        }
    }

    public function pendaftardelete($id){
        $agenda = Agenda::find($id);
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();
        
        return redirect()->back()->with('success','Data Has Been Deleted');
    }
    public function generateNumber(){
        do{
            $token = mt_rand(999999999, 9999999999);
        }while(Pendaftar::where("token", "=", $token)->first());

        return $token;
    }
    
    public function approve(Request $request, $id){
        $pendaftar = Pendaftar::find($id);
        $token = hash('sha256', $this->generateNumber());
        $pendaftar->status = 'Approved';
        $pendaftar->token = $token;
        $pendaftar->save();

        $tokenQR = $pendaftar->token;
        $mail = [ 
                'kepada' => $pendaftar->email, 
                'nama' => $pendaftar->name,
                'email' => 'pdfi@gmail.com', 
                'dari' => 'PDFI Jaya', 
                'subject' => 'Terimakasih Telah Mendaftar',
                'token' => $tokenQR,
            ]; 
            Mail::send('absen', $mail, function($message) use ($mail){ 
                $message->to($mail['kepada']) 
                ->from($mail['email'], $mail['dari']) 
                ->subject($mail['subject']); 
            });
        Alert::success('Success', 'Data Telah Di Approve Sistem Akan Mengirim Qr Ke Email Pendaftar Otomatis');
        return redirect()->back();
    }

    public function pendaftar($id){
        $agenda = Agenda::find($id);
        $pendaftar = Pendaftar::where('id_agenda', $agenda->id)->get();

        return view('cabang.daftar', compact('agenda', 'pendaftar'));
    }
}
