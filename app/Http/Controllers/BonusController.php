<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bonus;
use App\Http\Requests\BonusRequest;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonus = Bonus::all();
        return view('pages.bonus.index',compact('bonus'))->with('i', (request()->input('page', 1)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bonus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BonusRequest $request)
    {
        $data = $request->all();
        $nama = $request->input('nama');
        $pembayaran = $request->input('pembayaran');
        $bonus = $request->input('bonus');
        $total_bonus = $request->input('total_bonus');

            foreach ($nama as $key => $value){
                $data2 = new Bonus();
                $data2->nama = $nama[$key];
                $data2->pembayaran = $pembayaran[$key];
                $data2->bonus = $bonus[$key];
                $data2->total_bonus = $total_bonus[$key];
                $data2->save();
            }
        

        return redirect()->route('bonus.index')
        ->with('success','Data Berhasil Ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bonus = Bonus::findOrFail($id);
        return view('pages.bonus.show',compact('bonus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonus = Bonus::findOrFail($id);
        return view('pages.bonus.edit',compact('bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BonusRequest $request, $id)
    {
        $item = $request->all();
  
        $bonus = Bonus::findOrFail($id);
        $bonus->update($item);
        return redirect()->route('bonus.index')
                        ->with('success','Data Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Bonus::findOrFail($id);
        $item->delete();

        return redirect()->route('bonus.index')
        ->with('success','Data Berhasil Dihapus.');
    }
}
