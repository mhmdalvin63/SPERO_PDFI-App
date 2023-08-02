<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function update(){
        $Update = Update::latest()->get();
        return view("pages.update", compact('Update'));
    }

    public function index(){
        $Update = Update::latest()->get();
        return view("pages.beranda", compact('Update'));
    }

    public function detailupdate($id){
        $detailupdate = Update::findorfail($id);
        $allupdate = Update::latest()->get();
        return view('pages.detailUpdate', compact('detailupdate', 'allupdate'));
    }
}
