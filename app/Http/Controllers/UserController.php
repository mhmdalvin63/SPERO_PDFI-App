<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userindex = User::where('level', '!=', 'admin')->get();
        return view('admin.user.index', compact('userindex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ],[
            'email' => 'Input Email',
            'name' => 'Input Username',
            'no_telp' => 'Input Phone Number',
            'password' => 'Input Password',
            'password.min' => 'Password Must Be 8 Character',
        ]);   
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->password = bcrypt($request->password);
            $user->level = 'user';
            $user->verification = 'verified';
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
        $userEdit = User::find($id);
        return view('admin.user.edit', compact('userEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'no_telp' => 'required',
        ],[
            'email' => 'Input Email',
            'name' => 'Input Username',
            'no_telp' => 'Input Phone Number',
        ]);   

        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
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
        return redirect('/admin/user-management')->with('success', 'User Deleted');
    }

    public function resetpassword($id){
        $user = User::find($id);
        $user->password = bcrypt('Pdfi_user123');
        $user->save();
        Alert::success('Success', 'Password Updated Successfully');
        return redirect('/admin/user-management');
    }
}
