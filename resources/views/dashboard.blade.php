@extends('layouts.app')

@section('js')
    {{-- <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }} --}}
    <script src="{{ $chartStokAkhir->cdn() }}"></script>
    <script src="{{ $chartPaletKosong->cdn() }}"></script>
    <script src="{{ $chartPaletTerpakai->cdn() }}"></script>
    <script src="{{ $chartPrediksi->cdn() }}"></script>

    {{ $chartStokAkhir->script() }}
    {{ $chartPaletKosong->script() }}
    {{ $chartPaletTerpakai->script() }}
    {{ $chartPrediksi->script() }}

@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="{{ asset('/assets/img/pallet4.png') }}"
                            style="width: 70px !important; height: 70px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Total Pallet Stock</h4>
                            <div class="card-body">
                                {{ $total_stok_palet }}
                                {{-- {{ $stok_awal }} --}}
                            </div>
                            {{-- <h4>Stok Palet Awal Terpakai</h4>
                            <div class="card-body">
                                {{ $stok_awal_terpakai }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="{{ asset('/assets/img/pallet5.png') }}"
                            style="width: 50px !important; height: 50px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Used Pallets Stock</h4>
                            <div class="card-body">
                                {{ $stok_terpakai }}
                                {{-- {{ $stok_akhir }} --}}
                            </div>
                            {{-- <h4>Stok Palet Akhir Terpakai</h4>
                            <div class="card-body">
                                {{ $stok_akhir_terpakai }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="{{ asset('/assets/img/pallet3.png') }}"
                            style="width: 70px !important; height: 70px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Empty Pallets Stock</h4>
                            <div class="card-body">
                                {{ $stok_kosong }}
                                {{-- {{ $jumlah_stok_palet_baik }} --}}
                            </div>
                            {{-- <h4>Palet Baik Terpakai</h4>
                            <div class="card-body">
                                {{ $jumlah_stok_palet_baik_terpakai }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="{{ asset('/assets/img/warning.png') }}"
                            style="width: 55px !important; height: 55px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Empty Damaged Pallet</h4>
                            <div class="card-body">
                                {{ $jumlah_stok_palet_rusak }}
                            </div>
                            {{-- <h4>Palet Rusak Terpakai</h4>
                            <div class="card-body">
                                {{ $jumlah_stok_palet_rusak_terpakai }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-12"> --}}
                {{-- <div class="card"> --}}
                    {{-- <div class="card-header"> --}}
                        {{-- <h4>Total Kebutuhan Palet Kayu Per Bulan</h4> --}}
                        {{-- <h4>Grafik Stok Akhir</h4> --}}
                        {{-- <div class="card-header-action"> --}}
                            {{-- <div class="btn-group"> --}}
                              {{-- <a href="#" class="btn btn-primary">Month</a>
                              <a href="#" class="btn">Year</a> --}}
                            {{-- </div> --}}
                            {{-- <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
                                <label for="year" class="form-label">Pilih Tahun:</label>
                                <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                    @foreach ($years as $yearOption)
                                        <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>
                                            {{ $yearOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </form> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- <div class="card-body"> --}}
                        <!-- Tempatkan canvas untuk grafik di sini -->
                        {{-- <canvas id="myChart" height="80"></canvas> --}}

                        {{-- {!! $chart->container() !!} --}}
                        {{-- {!! $chartStokAkhir->container() !!} --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Palet Terpakai</h4>
                    </div>
                    <div class="card-body">
                        {!! $chartPaletTerpakai->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Palet Kosong</h4>
                    </div>
                    <div class="card-body">
                        {!! $chartPaletKosong->container() !!}
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stock Chart of Pallets in Use</h4>
                    </div>
                    <div class="card-body">
                        {!! $chartPaletTerpakai->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stock Chart of Pallets in Empty</h4>
                    </div>
                    <div class="card-body">
                        {!! $chartPaletKosong->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pallet Requirement Prediction Chart</h4>
                    </div>
                    <div class="card-body">
                        {!! $chartPrediksi->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Notes</h4>
                        <div class="card-header-action">
                            {{-- <div class="btn-group">
                              <a href="#" class="btn btn-primary">Month</a>
                              <a href="#" class="btn">Year</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            {{-- <li><strong>Stok Awal : </strong></li>
                            <ul>
                                <li>Jumlah stok palet kayu yang tersedia pada awal shift</li>
                            </ul>
                            <li><strong>Stok Akhir : </strong></li>
                            <ul>
                                <li>Jumlah stok palet kayu pada akhir shift tersebut</li>
                            </ul> --}}
                            <li><strong>Kondisi Palet Terpakai : </strong></li>
                            <ul>
                                <li>Palet yang digunakan untuk penyimpanan produk ALF-3</li>
                            </ul>
                            <li><strong>Kondisi Palet Kosong : </strong></li>
                            <ul>
                                <li>Kondisi dimana palet tersebut tidak terdapat produk dan digunakan untuk buffer stok palet</li>
                            </ul>
                            {{-- <li><strong>Kondisi Baik : </strong></li>
                            <ul>
                                <li>Jumlah antara kondisi palet terpakai ditambah palet kosong</li>
                            </ul> --}}
                            <li><strong>Kondisi Palet Rusak : </strong></li>
                            <ul>
                                <li>Jumlah kondisi palet yang rusak</li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
@endsection
