<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userindex = User::where('level', 'user')->get();
        return view('admin.user.index', compact('userindex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kota = City::all();
        return view('admin.user.create', compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_anggota_idi' => 'required',
            'no_anggota_pdfi' => 'required',
            'asal_cabang' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_praktek' => 'required',
            'password' => 'required|min:8',
        ],[
            'email' => 'Input Your Email',
            'name' => 'Input Your Username',
            'alamat' => 'Input Your Addres',
            'no_anggota_idi' => 'Input Your IDI Number',
            'no_anggota_pdfi' => 'Input Your PDFI Number',
            'asal_cabang' => 'Input Your Branch Clinic',
            'tempat_praktek' => 'Input Your Address Branch Clinic',
            'jenis_kelamin' => 'Input Your Gender',
            'tanggal_lahir' => 'Input Your Date of Birth',
            'password' => 'Input Your Password',
            'password.min' => 'Password Must Be 8 Character',
        ]);   
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->no_anggota_idi = $request->no_anggota_idi;
            $user->no_anggota_pdfi = $request->no_anggota_pdfi;
            $user->asal_cabang = $request->asal_cabang;
            $user->tempat_praktek = $request->tempat_praktek;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->password = bcrypt($request->password);
            $user->level = 'user';
            $user->verification = 'verified';
            $user->status = 'aktif';
            if($request->hasFile('bukti_keanggotaan'))
            {
                $buktiAnggota = 'Anggota'.rand(1,99999).'.'.$request->bukti_keanggotaan->getClientOriginalExtension();
                $request->file('bukti_keanggotaan')->move(public_path().'/img/', $buktiAnggota);
                $user->bukti_keanggotaan = $buktiAnggota;
                $user->save();
            }
            $user->save();
            Alert::success('Success', 'Data Created Successfully');
            return redirect('/admin/user-management');
            
        }
            catch(Throwable $e){
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
        
        $kota = City::all();
        $userEdit = User::find($id);
        return view('admin.user.edit', compact('userEdit', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email' => '',
            'name' => '',
            'alamat' => '',
            'no_anggota_idi' => '',
            'no_anggota_pdfi' => '',
            'asal_cabang' => '',
            'tempat_praktek' => '',
        ],[
            'email' => '',
            'name' => '',
            'alamat' => '',
            'no_anggota_idi' => '',
            'no_anggota_pdfi' => '',
            'asal_cabang' => '',
            'tempat_praktek' => '',
        ]);   

        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->no_anggota_idi = $request->no_anggota_idi;
            $user->no_anggota_pdfi = $request->no_anggota_pdfi;
            $user->asal_cabang = $request->asal_cabang;
            $user->tempat_praktek = $request->tempat_praktek;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->tanggal_lahir = $request->tanggal_lahir;
            if($request->hasFile('bukti_keanggotaan'))
            {
                $buktiAnggota = 'Anggota'.rand(1,99999).'.'.$request->bukti_keanggotaan->getClientOriginalExtension();
                $request->file('bukti_keanggotaan')->move(public_path().'/img/', $buktiAnggota);
                $user->bukti_keanggotaan = $buktiAnggota;
                $user->save();
            }
            $user->save();
            Alert::success('Success', 'Data Updated Successfully');
           
            return redirect('/admin/user-management');
            
        }
            catch(Throwable $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user-management');
    }

    public function resetpassword($id){
        $user = User::find($id);
        $user->password = bcrypt('Pdfi_user123');
        $user->save();
        Alert::success('Success', 'Password Updated Successfully');
        return redirect('/admin/user-management');
    }

    public function verified($id){
        $user = User::find($id);
        $user->verification ='verified';
        $user->save();
        Alert::success('Success', 'Verified Successfully');
        return redirect('/admin/user-management');
    }

    public function activated($id){
        $user = User::find($id);
        $user->status ='aktif';
        $user->save();
        Alert::success('Success', 'Activated Successfully');
        return redirect('/admin/user-management');
    }

    public function nonactivated($id){
        $user = User::find($id);
        $user->status ='nonaktif';
        $user->save();
        Alert::success('Success', 'Unactivated Successfully');
        return redirect('/admin/user-management');
    }
}
