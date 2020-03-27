<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\TransactionRequest; //panggil controllernya
use App\Transaction; //panggil modelnya
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //memanggil semua data relasi table dari nama function
        $items = Transaction::with([
            'details','travel_package','user'
        ])->get(); 
            // var_dump($items);
            // die;
        return view('pages.admin.transaction.index',[
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        // memanggil semua form
        $data = $request->all();
        //slug = agar di link urg berbentuk kata bukan index/angka
        $data['slug'] =  Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // findOrFail = jika data ada akan dimunculkan kalo gada 404
        $item = Transaction::with([
            'details','travel_package', 'user'
        ])-> findOrFail($id);

        return view('pages.admin.transaction.detail',[
            // item = yg aka dipanggil di view detail
            'item' => $item
        ]);
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
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit',[
            // item = yg aka dipanggil di view edit
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        // memanggil semua form
        $data = $request->all();
        //slug = agar di link urg berbentuk kata bukan index/angka
        $data['slug'] =  Str::slug($request->title);

        $item = Transaction::findOrFail($id);
        $item->update($data);   
        
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
