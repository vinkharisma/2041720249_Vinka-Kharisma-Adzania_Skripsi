@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Stok Data List - Terpakai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/palet-terpakai">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Pallet Stock Data</h2>
            <div class="card">
                <form action="{{ route('palet-terpakai.update', $palet_terpakai) }}" method="POST">
                    <div class="card-header">
                        <h4>Edit Pallet Stock Data Form</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ $palet_terpakai->tanggal }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group">
                            <label for="name">Keterangan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $palet_terpakai->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Stok Awal --}}
                        <div class="form-group">
                            <label for="stok_awal">Stok Awal</label>
                            <input type="text" class="form-control @error('stok_awal') is-invalid @enderror" id="stok_awal"
                                name="stok_awal" value="{{ $palet_terpakai->stok_awal }}">
                            @error('stok_awal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Masuk --}}
                        <div class="form-group">
                            <label for="masuk">Masuk</label>
                            <input type="text" class="form-control @error('masuk') is-invalid @enderror" id="masuk"
                                name="masuk" value="{{ $palet_terpakai->masuk }}">
                            @error('masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Keluar --}}
                        <div class="form-group">
                            <label for="keluar">Keluar</label>
                            <input type="text" class="form-control @error('keluar') is-invalid @enderror" id="keluar"
                                name="keluar" value="{{ $palet_terpakai->keluar }}">
                            @error('keluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Stok Akhir --}}
                        <div class="form-group">
                            <label for="stok_akhir">Stok Akhir</label>
                            <input type="text" class="form-control @error('stok_akhir') is-invalid @enderror" id="stok_akhir"
                                name="stok_akhir" value="{{ $palet_terpakai->keluar }}">
                            @error('stok_akhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah Stok Palet Baik --}}
                        <div class="form-group">
                            <label for="jumlah_stok_palet_baik">Jumlah Stok Palet Baik</label>
                            <input type="text" class="form-control @error('jumlah_stok_palet_baik') is-invalid @enderror" id="jumlah_stok_palet_baik"
                                name="jumlah_stok_palet_baik" value="{{ $palet_terpakai->jumlah_stok_palet_baik }}">
                            @error('jumlah_stok_palet_baik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah Stok Palet Rusak --}}
                        <div class="form-group">
                            <label for="jumlah_stok_palet_rusak">Jumlah Stok Palet Rusak</label>
                            <input type="text" class="form-control @error('jumlah_stok_palet_rusak') is-invalid @enderror" id="jumlah_stok_palet_rusak"
                                name="jumlah_stok_palet_rusak" value="{{ $palet_terpakai->jumlah_stok_palet_rusak }}">
                            @error('jumlah_stok_palet_rusak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('palet-terpakai.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
