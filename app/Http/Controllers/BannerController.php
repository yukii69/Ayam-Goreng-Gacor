<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('back.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = Banner::all();
        return view('back.banner.create', compact('banner'));
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
            'judul_banner' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_banner' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);

        $data = $request->all();

        $image = $request->file('gambar_banner');
        $filename = $request->file('gambar_banner')->getClientOriginalName();
        $path = 'uploads/banner';
        $image->move($path,$filename);
        $data['gambar_banner'] = $filename;
        Banner::create($data);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('banner.index');
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
        $banner = Banner::find($id);

        return view('back.banner.edit', compact('banner'));
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
            'judul_banner' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar_banner' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);
        
        $data = $request->all();

        $banner = Banner::find($id);

        if ($request->hasFile('gambar_banner')) {
            $image = $request->file('gambar_banner');
            $filename = $request->file('gambar_banner')->getClientOriginalName();
            $path = 'uploads/banner';
            $image->move($path, $filename);
            $data['gambar_banner'] = $filename;

            // hapus gambar lama
            if (File::exists(public_path($path . '/' . $banner->gambar_banner))) {
                File::delete(public_path($path . '/' . $banner->gambar_banner));
            }
        }

        $banner->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $image_path = public_path('uploads/banner/' . $banner->gambar_banner);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $banner->delete();
    
        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('banner.index');
    }
}
