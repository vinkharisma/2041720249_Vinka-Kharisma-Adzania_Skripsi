@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Prediction Result</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            {{-- <h2 class="section-title">ARIMA Model</h2> --}}

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Result</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                {{-- <strong>Mean Absolute Percentage Error (MAPE):</strong> {{ number_format($mape, 3) }} --}}
                                <strong>Mean Absolute Percentage Error (MAPE):</strong> {{ is_numeric($mape) ? number_format($mape * 100, 2) : $mape }}%
                                {{-- <strong>Mean Absolute Percentage Error (MAPE):</strong> {{ number_format($mape* 100, 2) }}% --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    {{-- <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td class="text-center">{{ $result['id'] }}</td>
                                                <td class="text-center">{{ $result['date'] }}</td>
                                                <td class="text-right">{{ number_format($result['forecast'], 7) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Prediksi Kebutuhan Palet</th>
                                            {{-- <th>Lower CI</th>
                                            <th>Upper CI</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prediksiData as $row)
                                            <tr>
                                                <td>{{ $row['Tanggal'] }}</td>
                                                <td>{{ number_format($row['Prediksi Kebutuhan Palet']) }} ea</td>
                                                {{-- <td>{{ number_format($row['Lower CI'], 2) }}</td>
                                                <td>{{ number_format($row['Upper CI'], 2) }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
