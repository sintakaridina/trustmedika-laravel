<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.add');
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
            'nama' => 'required',
            'domisili'  => 'required',
            'gender'   => 'required',
            'telepon' => 'required',
        ], [
            'nama.required' => 'Nama belum diisi',
            'domisili.required' => 'Domisili belum diisi',
            'telepon.required' => 'Telepon belum diisi.'
        ]);      
            Pegawai::create($validated);
            return redirect('pegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        return view('pegawai.detail',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        return view('pegawai.add', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'domisili'  => 'required',
            'gender'   => 'required',
            'telepon' => 'required',
        ], [
            'nama.required' => 'Nama belum diisi',
            'domisili.required' => 'Domisili belum diisi',
            'telepon.required' => 'Telepon belum diisi.'

        ]);  
        Pegawai::where('id', $id)->update($validated);
        return redirect('pegawai')->with('success', 'Data pegawai berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $pegawai->delete();
        return redirect('pegawai')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
