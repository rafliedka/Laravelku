@extends('layouts.index')
@section('content')
@php
    $judul = ['No','ISBN','Judul Buku','Stok','Pengarang','Penerbit','Kategori','Tindakan'];
    $no = 1;
@endphp
    <h3>Daftar Buku</h3>
    <br>
    <a class="btn btn-primary btn-md" href="{{ route('buku.create') }}" role="button"><i class="fas fa-plus-circle"></i> Add File</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($judul as $judul)
                    <th>{{ $judul }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_buku as $buku)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $buku->isbn }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->stok }}</td>
                    <td>{{ $buku->nama }}</td>
                    <td>{{ $buku->pen }}</td>
                    <td>{{ $buku->kat }}</td>
                    <td>
                        <form method="POST" action="{{ route('buku.destroy',$buku->id) }}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-outline-info" href="{{ route('buku.show',$buku->id) }}" title="klik untuk melihat secara detail">lihat detail</a>
                            <a class="btn btn-outline-warning" href="{{ route('buku.edit',$buku->id) }}" title="klik untuk mengedit data">Ubah</a>
                            <button class="btn btn-outline-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection