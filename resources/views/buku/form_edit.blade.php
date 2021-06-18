@extends('layouts.index')
@section('content')
@php
    $rs1 = App\Models\Pengarang::all();
    $rs2 = App\Models\Penerbit::all();
    $rs3 = App\Models\Kategori::all();
@endphp
    <h3>Form Edit Buku</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('buku.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" value="{{ $rs->isbn }}" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul" value="{{ $rs->judul }}" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group">
            <label>Tahun Cetak</label>
            <input type="text" name="tahun_cetak" value="{{ $rs->tahun_cetak }}" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" value="{{ $rs->stok }}" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <select class="form-control" name="idpengarang"/>
            <option value="">-- Pilih Pengarang --</option>
            @foreach ($rs1 as $p)
            {{-- Edit Pengarang --}}
            @php
                $sel1 = ($p->id == $rs->idpengarang) ? 'selected' : '';
            @endphp
                <option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Penerbit</label>
            <select class="form-control" name="idpenerbit"/>
            <option value="">-- Pilih Penerbit --</option>
            @foreach ($rs2 as $q)
            {{-- Edit Penerbit --}}
            @php
                $sel2 = ($q->id == $rs->idpenerbit) ? 'selected' : '';
            @endphp
                <option value="{{ $q->id }}" {{ $sel2 }}>{{ $q->nama }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Kategori</label><br/>
            @foreach ($rs3 as $kat)
            {{-- Edit Kategori --}}
            @php
                $cek = ($kat->id == $rs->idkategori) ? 'checked' : '';
            @endphp
                <input type="radio" name="idkategori" 
                value="{{ $kat->id }}" {{ $cek }} /> {{ $kat->nama }} &nbsp;
            @endforeach
        </div>
             <div class="form-group">
            <label>Cover Buku</label>
            <input type="file" name="cover" value="{{ $rs->cover }}" class="form-control"/>
        </div>
        <br>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/buku') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection