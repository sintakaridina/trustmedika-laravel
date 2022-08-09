@extends('layouts.app')

@section('isi')
<h1 class="mt-4">Tambah Data Poli</h1>
<p><a href="/poli">Poli</a> / Tambah Data</p>

@error('nama_poli')
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
      <label for="nama_poli" class="form-label">Nama Poli</label>
      <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="{{!empty($poli) ?  ucwords($poli->nama_poli) : " "}}">
    </div>
    <button type="submit" class="btn btn-sm btn-success">Submit</button>
</form>
@endsection