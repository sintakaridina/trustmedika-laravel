@extends('layouts.app')

@section('isi')
<h1 class="mt-4">Tambah Data Pegawai</h1>
<p><a href="/pegawai">Pegawai</a> / Tambah Data</p>

@error('nama')
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
@error('telepon')
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
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{!empty($pegawai) ?  ucwords($pegawai->nama) : " "}}">
    </div>
    <div class="mb-3">
      <label for="domisili" class="form-label">Domisili</label>
      <input type="text" class="form-control" id="domisili" name="domisili" value="{{!empty($pegawai) ?  ucwords($pegawai->domisili) : " "}}" >
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" aria-label="Default select example" name="gender">
            <option value="l">Laki-laki</option>
            <option value="p">Perempuan</option>
          </select>
      </div>
    <div class="mb-3">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" id="telepon" name="telepon" value="{{!empty($pegawai) ?  $pegawai->telepon : " "}}" >
    </div>
    <button type="submit" class="btn btn-sm btn-success">Submit</button>
</form>
@endsection