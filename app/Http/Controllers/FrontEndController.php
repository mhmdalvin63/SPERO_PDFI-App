<?php

namespace App\Http\Controllers;

use Share;
use Carbon\Carbon;
use App\Models\Agenda;
use App\Models\Banner;
use App\Models\Jurnal;
use App\Models\Update;
use App\Models\Pendaftar;
use App\Models\LikeUpdate;
use App\Models\TypeAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class FrontEndController extends Controller
{
    public function update(){
        $Update = Update::latest()->get();
        $UpdateUmum = Update::where('jenis_berita', 'umum')->latest()->get();
        return view("pages.update", compact('Update', 'UpdateUmum'));
    }

    public function agenda(){
        $agenda = Agenda::latest()->get();
        return view("pages.agenda", compact('agenda'));
    }

    public function download($file){
        return response()->download(public_path('file/'.$file));
    }

    public function index(){
        $banner = Banner::latest()->get();
        $listupdateumum = Update::where('jenis_berita', 'umum')->latest()->get();
        $listupdate = Update::latest()->get();
        $listagenda = Agenda::latest()->get();
        return view("pages.beranda", compact('listupdate', 'listagenda', 'banner', 'listupdateumum'));
    }

    public function detailupdate($slug){
        $shareComponent = Share::currentPage()
        ->facebook()
        ->twitter()
        ->telegram()    
        ->whatsapp();   
        $detailupdate = Update::where('slug', $slug)->first();
        $terkait = Update::where('slug', '!=', $slug)->latest()->get();
        $user = Auth::user()->id;
        $countlike = LikeUpdate::where('id_update', $detailupdate->id)->count();

        $similarUpdates = collect();

        foreach ($detailupdate->tag as $tag) {
            $relatedUpdates = $tag->upd->where('id', '!=', $detailupdate->id);
            $similarUpdates = $similarUpdates->concat($relatedUpdates);
        }

        $similarUpdates = $similarUpdates->unique('id');

        $like = LikeUpdate::where('id_user', $user)->where('id_update', $detailupdate->id)->first();
       
        return view('pages.detailUpdate', compact('detailupdate', 'terkait', 'shareComponent', 'like', 'similarUpdates', 'countlike'));
    }

    public function countliked($slug){
        $detailupdate = Update::where('slug', $slug)->first();
        $countlike = LikeUpdate::where('id_update', $detailupdate->id)->count();

        return response()->json(['countlike' => $countlike]);
    }

    public function liked($slug){
        $detailupdate = Update::where('slug', $slug)->first();
        $user = Auth::user()->id;
        $iflike =LikeUpdate::where('id_user', $user)->where('id_update', $detailupdate->id)->first();


        $like = new LikeUpdate();
        $like->id_update = $detailupdate->id;
        $like->id_user = $user;

            $like->save();


        return response()->json(['massage' => 'liked']);
    }

    public function unliked($slug){
        $detailupdate = Update::where('slug', $slug)->first();
        $user = Auth::user()->id;

        $like = LikeUpdate::where('id_user', $user)->where('id_update', $detailupdate->id)->first();
        if($like){
            $like->delete();
        }

        return response()->json(['massage' => 'unliked']);
    }

    public function myevent(){
        $user = Auth::user()->id;
        $now = Carbon::now();
        $pendaftar = Pendaftar::whereHas('agenda', function (Builder $query) use ($now) {
            $query->orderBy('end_date', 'ASC');
           })->where('id_user', $user)->where('status', 'Approved')->get();

        return view('pages.MyEvent', compact('pendaftar', 'now'));
    }

    public function detailagenda($slug){
        $now = Carbon::now();
        $provinsi = Province::all();
        $detailagenda = Agenda::where('slug', $slug)->first();
        $allagenda = Agenda::where('slug', '!=', $slug)->where('end_date', '>=', $now)->get();
        $pendaftar = Pendaftar::all();

        $similarUpdates = collect();

        foreach ($detailagenda->type as $tag) {
            $relatedUpdates = $tag->agenda->where('id', '!=', $detailagenda->id);
            $similarUpdates = $similarUpdates->concat($relatedUpdates);
        }

        $similarUpdates = $similarUpdates->unique('id');

        return view('pages.detailAgenda', compact('detailagenda', 'allagenda', 'now', 'provinsi', 'pendaftar', 'similarUpdates'));
    }

    public function jurnal(){
        $jurnal = Jurnal::latest()->get();
        return view('pages.jurnal', compact('jurnal'));
    }

    public function searchagenda(Request $request){
        // dd($request);
        $date = $request->date;
        $anggota = $request->search;
        if ($date) {
            $searchAgenda = Agenda::where('start_date', '<=', $date)->where('end_date', '>=', $date)->get();
            return view('pages.agendasearch', compact('searchAgenda'));
        } 
        else if($anggota){
            $searchAgenda = Agenda::whereHas('anggota', function (Builder $query) use ($anggota){
                $query->where('nama_anggota', 'LIKE', '%'.$anggota.'%');
            })->get();
            return view('pages.agendasearch', compact('searchAgenda'));
        }
        else if($date && $anggota){
            $searchAgenda = Agenda::where('start_date', '<=', $date)->where('end_date', '>=', $date)->whereHas('anggota', function (Builder $query) use ($anggota){
                $query->where('nama_anggota', 'LIKE', '%'.$anggota.'%');
            })->get();
            return view('pages.agendasearch', compact('searchAgenda'));
        }
        else {
            Alert::error('Error', 'Search is Null');
           return redirect()->back();
        }
    }

    public function search(Request $request){
        $banner = Banner::latest()->get();
        // dd($request);
        if ($request->search) {
            $searchUpdate = Update::where('judul_update','LIKE','%'.$request->search.'%')->latest()->get();
            $searchUpdateUmum = Update::where('judul_update','LIKE','%'.$request->search.'%')->where('jenis_berita', 'umum')->latest()->get();
            $searchAgenda = Agenda::where('judul_agenda','LIKE','%'.$request->search.'%')->orwhere('location','LIKE','%'.$request->search.'%')->latest()->get();
            return view('pages.search', compact('searchUpdate', 'searchAgenda', 'banner', 'searchUpdateUmum'));
        } else {
            Alert::error('Error', 'Search is Null');
           return redirect()->back();
        }
    }

    public function kota(Request $request){
        $code_provinsi = $request->id_provinsi;

        $kota = City::where('province_code', $code_provinsi)->get();
        
        echo "<option selected disabled>Pilih Kabupaten/Kota</option>";
        foreach($kota as $item){
            echo "<option value='$item->code'>$item->name</option>";
        }
    }

    public function kecamatan(Request $request){
        $code_kota = $request->id_kota;
        $kecamatan = District::where('city_code', $code_kota)->get();

        echo "<option selected disabled>Pilih Kecamatan</option>";
        foreach($kecamatan as $item){
            echo "<option value='$item->code'>$item->name</option>";
        }
    }

    public function generateNumber(){
        do{
            $token = mt_rand(999999999, 9999999999);
        }while(Pendaftar::where("token", "=", $token)->first());

        return $token;
    }

    

    public function daftaragenda(Request $request, $slug){
        // dd($request);
        $rules = [
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'id_kecamatan' => 'required',
            'id_provinsi' => 'required',
            'id_kota' => 'required',
        ];


        
            $detailagenda = Agenda::where('slug', $slug)->first();

            if($detailagenda->status_event == 'Buy'){
                $rules['id_tiket'] = 'required';
            };

            $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
            if ($validator->fails()) {
                Alert::error('Error', 'Isi Data Dengan Lengkap');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // dd($detailagenda);
            $daftar = new Pendaftar();
            // $daftar->token = $token;
            $daftar->id_user = Auth::user()->id;
            $daftar->id_agenda = $detailagenda->id;
            $daftar->name = $request->name;
            $daftar->email = $request->email;
            // $daftar->bukti_transfer = $request->bukti_transfer;
            $daftar->tanggal_lahir = $request->tanggal_lahir;
            $daftar->jenis_kelamin = $request->jenis_kelamin;
            $daftar->alamat = $request->alamat;
            $daftar->no_telp = $request->no_telp;
            $daftar->no_anggota_idi = Auth::user()->no_anggota_idi;
            $daftar->no_anggota_pdfi =  Auth::user()->no_anggota_pdfi;
            $daftar->cabang =  Auth::user()->asal_cabang;
            if($request->id_tiket){
                $daftar->id_tiket = $request->id_tiket;
            }
            $daftar->code_provinsi = $request->id_provinsi;
            $daftar->code_kota = $request->id_kota;
            $daftar->code_kecamatan = $request->id_kecamatan;
            $daftar->status = 'Unproved';
            // dd($daftar);
            if($request->hasFile('bukti_transfer'))
            {
                $fotoDaftar = 'bukti_transfer'.rand(1,99999).'.'.$request->bukti_transfer->getClientOriginalExtension();
                $request->file('bukti_transfer')->move(public_path().'/img/', $fotoDaftar);
                $daftar->bukti_transfer = $fotoDaftar;

               
            }
            if($request->hasFile('bukti_keanggotaan')){
                $fotoAnggota = 'bukti_keanggotaan'.rand(1,99999).'.'.$request->bukti_keanggotaan->getClientOriginalExtension();
                $request->file('bukti_keanggotaan')->move(public_path().'/img/', $fotoAnggota);
                $daftar->bukti_keanggotaan = $fotoAnggota;
                $daftar->save();
            }
           
            $daftar->save();

            // $mail = [ 
            //     'kepada' => $daftar->email, 
            //     'nama' => $daftar->name,
            //     'email' => 'pdfi@gmail.com', 
            //     'dari' => 'PDFI Jaya', 
            //     'subject' => 'Terimakasih Telah Mendaftar',
            //     'token' => base64_encode($daftar->token),
            // ]; 
            // Mail::send('absen', $mail, function($message) use ($mail){ 
            //     $message->to($mail['kepada']) 
            //     ->from($mail['email'], $mail['dari']) 
            //     ->subject($mail['subject']); 
            // });
            Alert::info('Success', 'Anda Telah Terdaftar Tunggu Approvment Dari Admin Untuk Mendapat Qr Code');
            // Artikel::create($request->all());
            return redirect()->back();
         
    }
}
