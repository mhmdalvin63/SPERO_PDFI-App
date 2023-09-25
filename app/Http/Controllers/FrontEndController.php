<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agenda;
use App\Models\Banner;
use App\Models\Update;
use App\Models\Pendaftar;
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

class FrontEndController extends Controller
{
    public function update(){
        $Update = Update::latest()->get();
        return view("pages.update", compact('Update'));
    }

    public function agenda(){
        $agenda = Agenda::latest()->get();
        return view("pages.agenda", compact('agenda'));
    }

    public function index(){
        $banner = Banner::latest()->get();
        $listupdate = Update::latest()->get();
        $listagenda = Agenda::latest()->get();
        return view("pages.beranda", compact('listupdate', 'listagenda', 'banner'));
    }

    public function detailupdate($id){
        $detailupdate = Update::findorfail($id);
        $terkait = Update::where('id', '!=', $id)->latest()->get();
       
        return view('pages.detailUpdate', compact('detailupdate', 'terkait'));
    }

    public function myevent(){
        $user = Auth::user()->id;
        $now = Carbon::now();
        $pendaftar = Pendaftar::whereHas('agenda', function (Builder $query) use ($now) {
            $query->where('end_date', '>=', $now);
           })->where('id_user', $user)->where('status', 'Approved')->get();

        return view('pages.MyEvent', compact('pendaftar', 'now'));
    }

    public function detailagenda($id){
        $now = Carbon::now();
        $user = Auth::user()->id;
        $provinsi = Province::all();
        $detailagenda = Agenda::findorfail($id);
        $allagenda = Agenda::where('id', '!=', $id)->where('end_date', '>=', $now)->get();
        $pendaftar = Pendaftar::all();
        return view('pages.detailAgenda', compact('detailagenda', 'allagenda', 'now', 'provinsi', 'pendaftar', 'user'));
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

    

    public function daftaragenda(Request $request, $id){
        // dd($request);
        $this->validate($request,[
            'bukti_transfer' => 'required|file|mimes:jpeg,jpg,png,webp',
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'no_anggota_idi' => 'required',
            'no_anggota_pdfi' => 'required',
            'cabang' => 'required',
            'id_tiket' => 'required',
            'id_kecamatan' => 'required',
            'id_provinsi' => 'required',
            'id_kota' => 'required',
        ],[
            'bukti_transfer' => 'Insert Image',
            'bukti_transfer.mimes' => 'Image Must Be jpeg, jpg, png, webp',
            'name' => 'Insert Title Update',
            'tanggal_lahir' => 'Insert Topic Update',
            'jenis_kelamin' => 'Insert Start Date',
            'alamat' => 'Insert End Date',
            'no_telp' => 'Insert Location Event',
            'email' => 'Insert Organizer',
            'no_anggota_idi' => 'Insert Event Status',
            'no_anggota_pdfi' => 'Insert Event Status',
            'cabang' => 'Insert Event Status',
            'id_tiket' => 'Insert Event Status',
            'id_kecamatan' => 'Insert Event Status',
            'id_provinsi' => 'Insert Event Status',
            'id_kota' => 'Insert Event Status',
        ]);
        
            $detailagenda = Agenda::find($id);
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
            $daftar->no_anggota_idi = $request->no_anggota_idi;
            $daftar->no_anggota_pdfi = $request->no_anggota_pdfi;
            $daftar->cabang = $request->cabang;
            $daftar->id_tiket = $request->id_tiket;
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
            return redirect('/detailagenda/'.$detailagenda->id);
         
    }
}
