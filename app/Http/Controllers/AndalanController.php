<?php

namespace App\Http\Controllers;

use App\Models\Andalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class AndalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $andalan = Andalan::all();
        return view('back.andalan.index', compact('andalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $andalan = Andalan::all();
        return view('back.andalan.create', compact('andalan'));
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
            'judul_andalan' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_andalan' => 'mimes:png,jpg,jpeg|image|max:4096', 
        ]);

        $data = $request->all();

        $image = $request->file('gambar_andalan');
        $filename = $request->file('gambar_andalan')->getClientOriginalName();
        $path = 'uploads/andalan';
        $image->move($path,$filename);
        $data['gambar_andalan'] = $filename;
        Andalan::create($data);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('andalan.index');
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
        $andalan = Andalan::find($id);

        return view('back.andalan.edit', compact('andalan'));
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
            'judul_andalan' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_andalan' => 'mimes:png,jpg,jpeg|image|max:4096', 
        ]);
        
        $data = $request->all();

        $andalan = Andalan::find($id);

        if ($request->hasFile('gambar_andalan')) {
            $image = $request->file('gambar_andalan');
            $filename = $request->file('gambar_andalan')->getClientOriginalName();
            $path = 'uploads/andalan';
            $image->move($path, $filename);
            $data['gambar_andalan'] = $filename;

            // hapus gambar lama
            if (File::exists(public_path($path . '/' . $andalan->gambar_andalan))) {
                File::delete(public_path($path . '/' . $andalan->gambar_andalan));
            }
        }

        $andalan->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('andalan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $andalan = Andalan::find($id);
        $image_path = public_path('uploads/andalan/' . $andalan->gambar_andalan);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $andalan->delete();
    
        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('andalan.index');
    }
}
