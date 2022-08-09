<!DOCTYPE html>
<html>
<head>
	<title>DATA JADWAL DOKTER RS TRUSTMEDIKA SURABAYA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<table class="table table-bordered">
            <tr class="bg-primary">
                <td colspan="9">DATA JADWAL DOKTER RS TRUSTMEDIKA SURABAYA</td>
            </tr>
            <tr class="bg-info">
                <td>No</td>
                <td>Klinik</td>
                <td>Senin</td>
                <td>Selasa</td>
                <td>Rabu</td>
                <td>Kamis</td>
                <td>Jumat</td>
                <td>Sabtu</td>
                <td>Minggu</td>
            </tr>
            @php $i=1 @endphp
			@foreach($polis as $poli)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $poli->nama_poli }}</td>
            </tr>
            <tr> 
                <td></td>
                <td>Nama Dokter</td>
                {{-- <td>{{ $jadwal->pegawai->nama }} </td> --}}
            @foreach($jadwals as $jadwal)
            @if($jadwal->poli->nama_poli == $poli->nama_poli)
             @if($jadwal->hari == "senin")
             <td>{{ $jadwal->waktu_mulai->format("H:i") }} - {{ $jadwal->waktu_akhir->format("H:i") }}</td>
             @break 
             @endif
             @endif
            @endforeach
            </tr>
            @endforeach
        </table>
	</center>
 
</body>
</html>