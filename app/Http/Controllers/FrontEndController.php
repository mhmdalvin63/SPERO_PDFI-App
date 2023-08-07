<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Update;
use App\Models\TypeAgenda;
use Illuminate\Http\Request;

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
        $listupdate = Update::latest()->get();
        $listagenda = Agenda::latest()->get();
        return view("pages.beranda", compact('listupdate', 'listagenda'));
    }

    public function detailupdate($id){
        $detailupdate = Update::findorfail($id);
        $allupdate = Update::latest()->get();
        return view('pages.detailUpdate', compact('detailupdate', 'allupdate'));
    }

    public function detailagenda($id){
        $detailagenda = Agenda::findorfail($id);
        $allagenda = Agenda::all();
        return view('pages.detailAgenda', compact('detailagenda', 'allagenda'));
    }
}
