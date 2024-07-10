@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Stok Data List - Kosong</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/palet-kosong">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Create Pallet Stock Data</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Create Pallet Stock Data Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('palet-kosong.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{-- Tanggal --}}
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        name="tanggal" placeholder="Enter Tanggal">
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
                                        name="name" placeholder="Enter Keterangan">
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
                                        name="stok_awal" placeholder="Enter Stok Awal">
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
                                        name="masuk" placeholder="Enter Masuk">
                                    @error('masuk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- Keluar --}}
                                <div class="form-group">
                                    <label for="keluar">Keluar</label>
                                    <input type="text" class="form-control @error('keluar') is-invalid @enderror" id="keluar"
                                        name="keluar" placeholder="Enter Keluar">
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
                                        name="stok_akhir" placeholder="Enter Stok Akhir">
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
                                        name="jumlah_stok_palet_baik" placeholder="Enter Jumlah Stok Palet Baik">
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
                                        name="jumlah_stok_palet_rusak" placeholder="Enter Jumlah Stok Palet Rusak">
                                    @error('jumlah_stok_palet_rusak')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{ route('palet-kosong.index') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
