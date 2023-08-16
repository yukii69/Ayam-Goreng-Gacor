<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wa;
use RealRashid\SweetAlert\Facades\Alert;

class WaController extends Controller
{
    public function index()
    {
        $wa = Wa::all();
        return view('back.wa.index', compact('wa'));
    }

    public function create()
    {
        $wa = Wa::all();
        return view('back.wa.create', compact('wa'));
    }

    public function store(Request $request)
    {
        $wa = new Wa();
        $wa->name = $request->input('name');
        $wa->no = $request->input('no');
        $wa->status = $request->input('status');
        $wa->save();

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('wa.index');
    }

    public function edit($id)
    {
        $wa = Wa::findOrFail($id);
        return view('back.wa.edit', compact('wa'));
    }

    public function update(Request $request, $id)
    {
        $wa = Wa::findOrFail($id);
        $wa->name = $request->input('name');
        $wa->no = $request->input('no');
        $wa->status = $request->input('status');
        $wa->save();

        Alert::success('Berhasil', 'Data Berhasil Terupdate');
        return redirect()->route('wa.index');
    }

    public function destroy($id)
    {
        $wa = Wa::findOrFail($id);
        $wa->delete();

        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('wa.index');    }
}