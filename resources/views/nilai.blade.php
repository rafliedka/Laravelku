@php
$nama = "Jhomn";
$nilai = 69.99;
@endphp

{{-- Struktur kendali if --}}
@if ($nilai >= 60) {
    @php $ket = "lulus"; @endphp
} @else {
    @php $ket = "Gagal"; @endphp
}
@endif
Nama siswa : {{$nama}}
<br>Nilai : {{$nilai}}
<br>Keterangan : {{$ket}}