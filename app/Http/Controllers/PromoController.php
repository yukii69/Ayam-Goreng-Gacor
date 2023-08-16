<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promo = Promo::all();
        return view('back.promo.index', compact('promo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promo = Promo::all();
        return view('back.promo.create', compact('promo'));
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
            'judul_promo' => 'required|min:4',
            'diskon_promo' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_promo' => 'mimes:png,jpg,jpeg|image|max:4096', 
        ]);

        $data = $request->all();

        $image = $request->file('gambar_promo');
        $filename = $request->file('gambar_promo')->getClientOriginalName();
        $path = 'uploads/promo';
        $image->move($path,$filename);
        $data['gambar_promo'] = $filename;
        Promo::create($data);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('promo.index');
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
        $promo = Promo::find($id);

        return view('back.promo.edit', compact('promo'));
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
            'judul_promo' => 'required|min:4',
            'diskon_promo' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_promo' => 'mimes:png,jpg,jpeg|image|max:4096', 
        ]);
        
        $data = $request->all();

        $promo = Promo::find($id);

        if ($request->hasFile('gambar_promo')) {
            $image = $request->file('gambar_promo');
            $filename = $request->file('gambar_promo')->getClientOriginalName();
            $path = 'uploads/promo';
            $image->move($path, $filename);
            $data['gambar_promo'] = $filename;

            // hapus gambar lama
            if (File::exists(public_path($path . '/' . $promo->gambar_promo))) {
                File::delete(public_path($path . '/' . $promo->gambar_promo));
            }
        }

        $promo->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('promo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::find($id);
        $image_path = public_path('uploads/promo/' . $promo->gambar_promo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $promo->delete();
    
        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('promo.index');
    }
}
