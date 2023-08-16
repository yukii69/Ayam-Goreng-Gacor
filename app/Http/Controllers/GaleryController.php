<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galery = Galery::all();
        return view('back.galery.index', compact('galery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galery = Galery::all();
        return view('back.galery.create', compact('galery'));
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
            'nama_gambar' => 'required|min:4',
            'gambar_galery' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);

        $data = $request->all();

        $image = $request->file('gambar_galery');
        $filename = $request->file('gambar_galery')->getClientOriginalName();
        $path = 'uploads/galery';
        $image->move($path,$filename);
        $data['gambar_galery'] = $filename;
        Galery::create($data);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('galery.index');
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
        $galery = Galery::find($id);

        return view('back.galery.edit', compact('galery'));
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
            'nama_gambar' => 'required|min:4',
            'gambar_galery' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);
        
        $data = $request->all();

        $galery = Galery::find($id);

        if ($request->hasFile('gambar_galery')) {
            $image = $request->file('gambar_galery');
            $filename = $request->file('gambar_galery')->getClientOriginalName();
            $path = 'uploads/galery';
            $image->move($path, $filename);
            $data['gambar_galery'] = $filename;

            // hapus gambar lama
            if (File::exists(public_path($path . '/' . $galery->gambar_galery))) {
                File::delete(public_path($path . '/' . $galery->gambar_galery));
            }
        }

        $galery->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('galery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galery = Galery::find($id);
        $image_path = public_path('uploads/galery/' . $galery->gambar_galery);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $galery->delete();
    
        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('galery.index');
    }
}
