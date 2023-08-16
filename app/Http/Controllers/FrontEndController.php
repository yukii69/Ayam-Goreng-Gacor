<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Andalan;
use App\Models\Banner;
use App\Models\Galery;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\Testi;
use App\Models\Wa;
use DateTime;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_at')->get();
        $promos = Promo::orderBy('created_at')->get();
        $testis = Testi::orderBy('created_at')->get();
        $andalans = Andalan::orderBy('created_at')->get();
        $banners = Banner::orderBy('created_at')->get();
        $galerys = Galery::orderBy('created_at')->get();
        
        return view('front.layouts.home', [
            'galerys' => $galerys,
            'promos' => $promos,
            'menus' => $menus,
            'andalans' => $andalans,
            'testis' => $testis,
            'banners' => $banners,
        ]);
    }

    public function sendSubmit(Request $request)
    {
        $name = urlencode($request->input('name'));
        $subject = urlencode($request->input('subject'));
        $email = $request->input('email');;
        $jadwal = $request->input('jadwal');
    
        // Memformat tanggal dan waktu sesuai dengan format yang diinginkan
        $formattedJadwal = date('d F Y H:i', strtotime($jadwal));
    
        $no_wa = Wa::find(1)->no;
    
        // Menggabungkan pesan dengan informasi jadwal yang sudah diformat
        $pesan = "Nama: " . $name . "\n"
               . "Jumlah Tamu: " . $subject . "\n"
               . "Email: " . $email . "\n"
               . "Jadwal Pesanan: " . $formattedJadwal;
    
        $url = 'https://api.whatsapp.com/send?phone=' . $no_wa . '&text=' . urlencode($pesan);
        return redirect($url);
    }
}