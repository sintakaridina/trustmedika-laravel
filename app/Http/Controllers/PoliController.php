<?php

namespace App\Http\Controllers;

use App\Models\poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polis = Poli::all();
        return view('poli.index', compact('polis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nama_poli' => 'required',
        ], [
            'nama_poli.required' => 'Nama poli belum diisi',
        ]);      
            Poli::create($validated);
            return redirect('poli')->with('success', 'Poli berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poli = Poli::where('id', $id)->first();
        return view('poli.add', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poli=Poli::where('id', $id)->first();
        $validated = $request->validate([
            'nama_poli' => 'required',
        ], [
            'nama_poli.required' => 'Nama poli belum diisi',
        ]);  
        $poli->update($validated);
        return redirect('poli')->with('success', 'Nama poli berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poli = Poli::where('id', $id)->first();
        $poli->delete();
        return redirect('poli')->with('success', 'Data poli berhasil dihapus.');
    }
}
