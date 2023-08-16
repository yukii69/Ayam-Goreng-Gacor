<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\NullableType;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('back.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:user',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('back.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:user,name,' . $id,
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);

        $data = $request->only(['name', 'email']);
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        Alert::success('Berhasil', 'Data Berhasil Terupdate');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::info('Berhasil', 'Data Berhasil Terhapus');
        return redirect()->route('user.index');
    }
}
