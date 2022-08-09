@extends('layouts.app')

@section('isi')
<h1 class="mt-4">Jadwal</h1>
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
    
    <div class="d-flex mt-3">
        <div>
          <a href="{{ route('jadwal.create') }}" class="btn mb-3 btn-danger btn-sm"><i class="bi bi-plus-circle"></i> Tambah Data</a>
        </div>
        <div class="ms-auto">
            <a href="{{ route('jadwal.cetak') }}" class="btn mb-3 btn-success btn-sm">Cetak Data</a>
        </div>
    </div>
      @if(!$jadwals->isEmpty())
      <table class="table table-borderless">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center">Hari</th>
            <th scope="col" class="text-center">Waktu</th>
            <th scope="col" class="text-center">Poli</th>
            <th scope="col" class="text-center">Dokter</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jadwals as $jadwal)
          <tr>
            <td class="text-center">{{ ucwords($jadwal->hari) }}</td>
            <td class="text-center">{{ $jadwal->waktu_mulai->format('H:i') }} - {{ $jadwal->waktu_akhir->format('H:i') }}</td>
            <td class="text-center">{{ ucwords($jadwal->poli->nama_poli) }}</td>
            <td class="text-center">{{ ucwords($jadwal->pegawai->nama) }}</td>
          </tr>
          <tr>
            <td colspan="4" class="text-end"><a href="/jadwal/{{ $jadwal->id }}" class="btn btn-primary btn-sm">Detail</a>
                <a href="/jadwal/edit/{{ $jadwal->id }}" class="btn btn-secondary btn-sm">Edit</a>
                <a href="/jadwal/delete/{{ $jadwal->id }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $jadwal->id }}">Hapus</a> <hr class="mb-0">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <p class="text-center">Data belum tersedia</p>
      @endif

<!--START MODAL HAPUS-->         
@foreach ($jadwals as $jadwal)
<div class="modal fade" id="modalHapus{{ $jadwal->id }}" tabindex="-1" aria-labelledby="modalHapus{{ $jadwal->id }}" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <form action="/jadwal/delete/{{ $jadwal->id }}" method="POST">
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