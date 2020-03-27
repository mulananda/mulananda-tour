<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        // ambil data TravelPackage dan galleries jika slugnya = dengan slug yg depanggil kemudian panggil data pertama atau gagal jika data tidak ditemukan
        $item = TravelPackage::with(['galleries'])->where('slug', $slug)->firstOrFail();

        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
