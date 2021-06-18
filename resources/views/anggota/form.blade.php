@extends('layouts.index')
@section('content')
    <h3>Form Anggota</h3>
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
    <form method="POST" action="{{ route('anggota.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Anggota</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email Anggota</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>HP Anggota</label>
            <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror" autocomplete="off" maxlength="15" />
            @error('hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Anggota</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"/>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
            <a href="{{ url('/buku') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection