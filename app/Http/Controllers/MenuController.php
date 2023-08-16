<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('back.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('back.menu.create', compact('menu'));
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
            'judul_menu' => 'required|min:4',
            'harga' => 'required',
            'gambar_menu' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);

        $data = $request->all();

        $image = $request->file('gambar_menu');
        $filename = $request->file('gambar_menu')->getClientOriginalName();
        $path = 'uploads/menu';
        $image->move($path,$filename);
        $data['gambar_menu'] = $filename;
        Menu::create($data);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('menu.index');
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
        $menu = Menu::find($id);

        return view('back.menu.edit', compact('menu'));
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
            'judul_menu' => 'required|min:4',
            'harga' => 'required',
            'gambar_menu' => 'mimes:jpg,jpeg|image|max:4096', 
        ]);
        
        $data = $request->all();

        $menu = Menu::find($id);

        if ($request->hasFile('gambar_menu')) {
            $image = $request->file('gambar_menu');
            $filename = $request->file('gambar_menu')->getClientOriginalName();
            $path = 'uploads/menu';
            $image->move($path, $filename);
            $data['gambar_menu'] = $filename;

            // hapus gambar lama
            if (File::exists(public_path($path . '/' . $menu->gambar_menu))) {
                File::delete(public_path($path . '/' . $menu->gambar_menu));
            }
        }

        $menu->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $image_path = public_path('uploads/menu/' . $menu->gambar_menu);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $menu->delete();
    
        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('menu.index');
    }
}
