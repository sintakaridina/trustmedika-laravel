@extends('layouts.app')

@section('isi')
<h1 class="mt-4">Data Poli/Klinik</h1>
    @if (session()->has('success'))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
      </svg>
      <div>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @endif
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
    
      
          <a href="{{ route('poli.create') }}" class="btn mb-3 btn-danger btn-sm"><i class="bi bi-plus-circle"></i> Tambah Data</a>
      @if(!$polis->isEmpty())
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-start col-md-3">Nama Poli</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($polis as $poli)
          <tr>
            <td class="text-center">{{ ucwords($poli->nama_poli) }}</td>
            <td colspan="3" class="text-center">
                <a href="/poli/edit/{{ $poli->id }}" class="btn btn-secondary btn-sm">Edit</a>
                <a href="/poli/delete/{{ $poli->id }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $poli->id }}">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <p class="text-center">Data belum tersedia</p>
      @endif

<!--START MODAL HAPUS-->         
@foreach ($polis as $poli)
<div class="modal fade" id="modalHapus{{ $poli->id }}" tabindex="-1" aria-labelledby="modalHapus{{ $poli->id }}" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <form action="/poli/delete/{{ $poli->id }}" method="POST">
  <div class="modal-body">
    @csrf
    @method('delete')
  <h4 class="text-center">Hapus Data ini?</h4>
  </div>
  <div class="modal-footer">      
  <button type="submit" class="btn btn-primary">Hapus</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
  </div>
  </form>
  </div>
  </div>
</div> 
@endforeach
<!--END MODAL HAPUS-->
@endsection