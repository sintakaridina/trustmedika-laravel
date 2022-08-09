<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\pegawai;
use App\Models\poli;
use Illuminate\Http\Request;
use PDF;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        $polis = Poli::all();
        return view('jadwal.add', compact('pegawais', 'polis'));
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
            'pegawai_id' => 'required',
            'poli_id'  => 'required',
            'waktu_mulai'   => 'required',
            'waktu_akhir' => 'required',
            'hari' => 'required'
        ], [
            'waktu_mulai' => 'Waktu mulai belum diisi',
            'waktu_akhir' => 'Waktu akhir belum diisi'
        ]);      
            Jadwal::create($validated);
            return redirect('jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal $jadwal)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawais = Pegawai::all();
        $polis = Poli::all();
        $jadwal = Jadwal::where('id', $id)->first();
        return view('jadwal.add', compact('jadwal', 'polis', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::where('id', $id)->first();

        $validated = $request->validate([
            'pegawai_id' => 'required',
            'poli_id'  => 'required',
            'waktu_mulai'   => 'required',
            'waktu_akhir' => 'required',
            'hari' => 'required'
        ], [
            'waktu_mulai' => 'Waktu mulai belum diisi',
            'waktu_akhir' => 'Waktu akhir belum diisi'
        ]);      
            $jadwal->update($validated);
            return redirect('jadwal')->with('success', 'Jadwal berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::where('id', $id)->first();
        $jadwal->delete();
        return redirect('jadwal')->with('success', 'Data jadwal berhasil dihapus.');
    }
    public function cetak_pdf()
    {
    	$jadwals = Jadwal::all(); 
        $polis = Poli::all(); 
    	$pdf = PDF::loadview('jadwal.jadwal_pdf',['jadwals'=>$jadwals, 'polis'=>$polis]);
    	return $pdf->download('jadwal.pdf');
    }
}
