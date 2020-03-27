<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;

class HomeController extends Controller
{ 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //mengambil fotonya
        $items = TravelPackage::with(['galleries'])->get();

        return view('pages.home', [
            //kemudian bawa fotonya ke view
            'items' => $items
        ]);
    }
}
