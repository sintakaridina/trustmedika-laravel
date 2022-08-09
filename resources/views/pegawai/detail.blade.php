@extends('layouts.app')

@section('isi')
<h1 class="mt-4">Lihat Data Pegawai</h1>
<p><a href="/pegawai">Pegawai</a> / Lihat Data</p>
<div class="container">


<p>Nama        : {{$pegawai->nama}}</p>
<p>Domisili    : {{$pegawai->domisili}}</p>
<p>Gender      : {{$pegawai->gender}}</p>
<p>Telepon     : {{$pegawai->telepon}}</p>
</div>
@endsection
