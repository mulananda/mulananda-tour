<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\GalleryRequest; //panggil controllernya
use App\Gallery; //panggil modelnya
use App\TravelPackage; //panggil modelnya
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.create',[
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        // memanggil semua form
        $data = $request->all();

        // file('image') nama name di create.blade.php 
        $data['image'] = $request->file('image')->store(
            //definisi path, public = gambar disimpan secara public
            'assets/gallery', 'public'
        );
        Gallery::create($data);
        return redirect()->route('gallery.index');
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
        // findOrFail = jika data ada akan dimunculkan kalo gada 404
        $item = Gallery::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit',[
            // item = yg aka dipanggil di view edit
            'item' => $item,
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        // memanggil semua form
        $data = $request->all();
         // file('image') nama name di create.blade.php 
         $data['image'] = $request->file('image')->store(
            //definisi path, public = gambar disimpan secara public
            'assets/gallery', 'public'
        );

        $item = Gallery::findOrFail($id);
        $item->update($data);   
        
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }
}
