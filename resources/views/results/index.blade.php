@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Prediction Result</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/data">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Result</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Prediction Result Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Prediksi Kebutuhan Palet</th>
                                        </tr>

                                        {{-- @foreach ($datas as $key => $data)
                                            <tr>
                                                <td class="text-center">{{ ($datas->currentPage() - 1) * $datas->perPage() + $key + 1 }}</td>
                                                <td>{{ $data->tanggal }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td class="text-right">{{ $data->stok_awal }}</td>
                                                <td class="text-right">{{ $data->masuk }}</td>
                                                <td class="text-right">{{ $data->keluar }}</td>
                                                <td class="text-right">{{ $data->stok_akhir }}</td>
                                                <td class="text-right">{{ $data->jumlah_stok_palet_baik }}</td>
                                                <td class="text-right">{{ $data->jumlah_stok_palet_rusak}}</td>
                                                <td>{{ $data->created_at}}</td>

                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- <div class="d-flex justify-content-center">
                                    {{ $datas->withQueryString()->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
@endpush
