<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Models\TipeMobil;

class TipeMobilController extends Controller
{
    function index()
    {
        $tipeMobilData = TipeMobil::get();
        return view('Pages.tipemobil.index', ['tipeMobilData' => $tipeMobilData]);
    }

    function create()
    {
        return view('Pages.tipemobil.create');
    }

    function store()
    {
        $tipeMobilData = new TipeMobil;
        $tipeMobilData->tipe = request()->tipe;
        $tipeMobilData->save();

        return redirect()->to('/tipemobil')->with('success','Data tipe berhasil ditambahkan');
    }

    function formEdit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('Pages.tipemobil.form_edit', ['tipeMobilData' => $tipeMobilData]);
    }

    function update ($id, Request $request)
    {
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->tipe = request()->tipe;
        $tipeMobilData->save();

        return redirect()->to('/tipemobil')->with('success', 'Data tipe berhasil diupdate');
    }

    function delete($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->delete();

        return redirect()->to('/tipemobil')->with('success', 'Data tipe berhasil dihapus');
    }
}
