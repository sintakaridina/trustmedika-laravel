@extends('layouts.app')

@section('isi')
<h1 class="mt-4">Tambah Jadwal</h1>
<p><a href="/jadwal">Jadwal</a> / Tambah Data</p>

@error('waktu_awal')
<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
    <use xlink:href="#exclamation-triangle-fill" />
  </svg>
  <div>
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@enderror
@error('waktu_akhir')
<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
    <use xlink:href="#exclamation-triangle-fill" />
  </svg>
  <div>
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@enderror

<form class="p-2" action="" method="POST">
    @csrf
    <div class="mb-3">
      <label for="poli" class="form-label">Poli</label>
      <select class="form-select" aria-label="Default select example" name="poli_id">
        @foreach ($polis as $poli)
        <option value="{{$poli->id}}">{{ ucwords($poli->nama_poli) }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="dokter" class="form-label">Dokter</label>
      <select class="form-select" aria-label="Default select example" name="pegawai_id">
        @foreach ($pegawais as $pegawai)
        <option value="{{$pegawai->id}}">{{ ucwords($pegawai->nama) }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
        <label for="hari" class="form-label">Hari</label>
        <select class="form-select" aria-label="Default select example" name="hari">
            <option value="senin">Senin</option>
            <option value="selasa">Selasa</option>
            <option value="rabu">Rabu</option>
            <option value="kamis">Kamis</option>
            <option value="jumat">Jumat</option>
            <option value="sabtu">Sabtu</option>
            <option value="minggu">Minggu</option>
          </select>
      </div>
    <div class="mb-3">
      <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
      <input type="time" id="waktu_mulai" name="waktu_mulai" />
    </div>
    <div class="mb-3">
        <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
        <input type="time" id="waktu_akhir" name="waktu_akhir" />
      </div>
    <button type="submit" class="btn btn-sm btn-success">Submit</button>
</form>
@endsection