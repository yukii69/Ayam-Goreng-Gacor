<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Andalan;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Galery;
use App\Models\Promo;
use App\Models\Testi;
use App\Models\User;
use App\Models\Wa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $andalan = Andalan::all();
        $banner = Banner::all();
        $galery = Galery::all();
        $menu = Menu::all();
        $promo = Promo::all();
        $testi = Testi::all();
        $testi = Testi::all();
        $user = User::all();
        $wa = Wa::all();
              
        return view('back.dashboard', [
            'andalan' => $andalan,
            'promo' => $promo,
            'testi' => $testi,
            'banner' => $banner,
            'menu' => $menu,
            'galery' => $galery,
            'user' => $user,
            'wa' => $wa,           
        ]);
    }
}