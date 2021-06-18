@extends('layouts.index')
@section('content')
    @foreach ($ar_anggota as $a)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($a->foto)) {
            @endphp
                <img src="{{ asset('images')}}/{{ $a->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title">{{ $a->nama }}</h5>
                <p class="card-text">
                    Email : {{ $a->email }}
                    <br/>HP : {{ $a->hp }}
                </p>
                <a href="{{ url('/anggota') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection