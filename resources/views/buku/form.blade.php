@extends('layouts.index')
@section('content')
@php
    $rs1 = App\Models\Pengarang::all();
    $rs2 = App\Models\Penerbit::all();
    $rs3 = App\Models\Kategori::all();
@endphp
    <h3>Form Buku</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('buku.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control @error('isbn') is-invalid @enderror" autocomplete="off" />
            @error('isbn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" autocomplete="off" />
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Tahun Cetak</label>
            <input type="text" name="tahun_cetak" value="{{ old('tahun_cetak') }}" class="form-control @error('tahun_cetak') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('tahun_cetak')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror" autocomplete="off" />
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <select class="form-control @error('idpengarang') is-invalid @enderror" name="idpengarang" />
            <option value="">-- Pilih Pengarang --</option>
            @foreach ($rs1 as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
            </select>
            @error('idpengarang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Penerbit</label>
            <select class="form-control @error('idpenerbit') is-invalid @enderror" name="idpenerbit" />
            <option value="">-- Pilih Penerbit --</option>
            @foreach ($rs2 as $q)
                <option value="{{ $q->id }}">{{ $q->nama }}</option>
            @endforeach
            </select>
            @error('idpenerbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Kategori</label><br/>
            @foreach ($rs3 as $k)
                <input type="radio" class="@error('idkategori') is-invalid @enderror" name="idkategori" 
                value="{{ $k->id }}"/> {{ $k->nama }} &nbsp;
            @endforeach
            @error('idkategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Cover Buku</label>
            <input type="file" name="cover" value="{{ old('cover') }}" class="form-control @error('cover') is-invalid @enderror"/>
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
            <a href="{{ url('/buku') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection