@extends('layouts.index')
@section('content')
    <h3>Form Edit Anggota</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('anggota.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Email Anggota</label>
                <input type="email" name="email" value="{{ $rs->email }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>HP Anggota</label>
                <input type="text" name="hp" value="{{ $rs->hp }}" class="form-control" autocomplete="off" maxlength="15" required/>
            </div>
            <div class="form-group">
                <label>Foto Anggota</label>
                <input type="file" name="foto" value="{{ $rs->foto }}" class="form-control"/>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/anggota') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection