@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Stok Data List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/data">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Pallet Stock Data</h2>
            <div class="card">
                <form action="{{ route('data.update', $data) }}" method="POST">
                    <div class="card-header">
                        <h4>Edit Pallet Stock Data Form</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label for="tanggal">Date</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ $data->tanggal }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group">
                            <label for="name">Description</label>
                            <select class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                <option value="USED" {{ $data->name == 'USED' ? 'selected' : '' }}>USED</option>
                                <option value="EMPTY" {{ $data->name == 'EMPTY' ? 'selected' : '' }}>EMPTY</option>
                            </select>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Stok Awal --}}
                        <div class="form-group">
                            <label for="stok_awal">Initial Stock</label>
                            <input type="text" class="form-control @error('stok_awal') is-invalid @enderror" id="stok_awal"
                                name="stok_awal" value="{{ $data->stok_awal }}">
                            @error('stok_awal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Masuk --}}
                        <div class="form-group">
                            <label for="masuk">In</label>
                            <input type="text" class="form-control @error('masuk') is-invalid @enderror" id="masuk"
                                name="masuk" value="{{ $data->masuk }}">
                            @error('masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Keluar --}}
                        <div class="form-group">
                            <label for="keluar">Out</label>
                            <input type="text" class="form-control @error('keluar') is-invalid @enderror" id="keluar"
                                name="keluar" value="{{ $data->keluar }}">
                            @error('keluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Stok Akhir --}}
                        <div class="form-group">
                            <label for="stok_akhir">Ending Stock</label>
                            <input type="text" class="form-control @error('stok_akhir') is-invalid @enderror" id="stok_akhir"
                                name="stok_akhir" value="{{ $data->stok_akhir }}">
                            @error('stok_akhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah Stok Palet Baik --}}
                        <div class="form-group">
                            <label for="jumlah_stok_palet_baik">Stock Quantity of Good Pallets</label>
                            <input type="text" class="form-control @error('jumlah_stok_palet_baik') is-invalid @enderror" id="jumlah_stok_palet_baik"
                                name="jumlah_stok_palet_baik" value="{{ $data->jumlah_stok_palet_baik }}">
                            @error('jumlah_stok_palet_baik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah Stok Palet Rusak --}}
                        <div class="form-group">
                            <label for="jumlah_stok_palet_rusak">Stock Quantity of Damaged Pallets</label>
                            <input type="text" class="form-control @error('jumlah_stok_palet_rusak') is-invalid @enderror" id="jumlah_stok_palet_rusak"
                                name="jumlah_stok_palet_rusak" value="{{ $data->jumlah_stok_palet_rusak }}">
                            @error('jumlah_stok_palet_rusak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('data.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
@endsection
