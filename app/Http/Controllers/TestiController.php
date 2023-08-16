<?php

namespace App\Http\Controllers;

use App\Models\Testi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class TestiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testi = Testi::all();
        return view('back.testi.index', compact('testi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testi = Testi::all();
        return view('back.testi.create', compact('testi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_testi' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_testi' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);

        $data = $request->all();

        $image = $request->file('gambar_testi');
        $filename = $request->file('gambar_testi')->getClientOriginalName();
        $path = 'uploads/testi';
        $image->move($path,$filename);
        $data['gambar_testi'] = $filename;
        Testi::create($data);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('testi.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testi = Testi::find($id);

        return view('back.testi.edit', compact('testi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul_testi' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_testi' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);
        
        $data = $request->all();

        $testi = Testi::find($id);

        if ($request->hasFile('gambar_testi')) {
            $image = $request->file('gambar_testi');
            $filename = $request->file('gambar_testi')->getClientOriginalName();
            $path = 'uploads/testi';
            $image->move($path, $filename);
            $data['gambar_testi'] = $filename;

            // hapus gambar lama
            if (File::exists(public_path($path . '/' . $testi->gambar_testi))) {
                File::delete(public_path($path . '/' . $testi->gambar_testi));
            }
        }

        $testi->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('testi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testi = Testi::find($id);
        $image_path = public_path('uploads/testi/' . $testi->gambar_testi);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $testi->delete();
    
        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('testi.index');
    }
}
