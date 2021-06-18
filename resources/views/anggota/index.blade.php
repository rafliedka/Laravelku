@extends('layouts.index')
@section('content')
@php
    $judul = ['No','Nama','Email','HP','Foto','Action'];
    $no = 1;
@endphp
    <h3>Daftar Anggota</h3>
    <a class="btn btn-primary btn-md" href="{{ route('anggota.create') }}" role="button"><i class="fas fa-plus-circle"></i> Add File</a>
    <br/>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($judul as $judul)
                    <th>{{ $judul }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_anggota as $a)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->hp }}</td>
                    <td width="15%" align="center">
                        @php
                        if(!empty($a->foto)) {
                        @endphp
                            <img src="{{ asset('images')}}/{{ $a->foto }}" width="50%" />
                        @php
                        } else {
                        @endphp
                            <img src="{{ asset('images')}}/no_picture.png" width="50%" />
                        @php
                        }
                        @endphp
                    </td>
                    <td>
                        <form method="POST" action="{{ route('anggota.destroy',$a->id) }}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-outline-info" href="{{ route('anggota.show',$a->id) }}" title="klik untuk melihat secara detail">lihat detail</a>
                            <a class="btn btn-outline-warning" href="{{ route('anggota.edit',$a->id) }}" title="klik untuk mengedit data">ubah</i></a>
                            <button class="btn btn-outline-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data">hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection