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
                {{-- <div class="col-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Statistic</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Count</th>
                                            <th class="text-center">Mean</th>
                                            <th class="text-center">Standard Deviation (Std)</th>
                                            <th class="text-center">Minimum</th>
                                            <th class="text-center">25th Percentile</th>
                                            <th class="text-center">Median (50th Percentile)</th>
                                            <th class="text-center">75th Percentile</th>
                                            <th class="text-center">Maximum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center">Count</th>
                                            <th class="text-center">Mean</th>
                                            <th class="text-center">Standard Deviation (Std)</th>
                                            <th class="text-center">Minimum</th>
                                            <th class="text-center">25%</th>
                                            <th class="text-center">Median (50%)</th>
                                            <th class="text-center">75%</th>
                                            <th class="text-center">Maximum</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right">{{ number_format($stats['count'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['mean'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['std'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['min'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['25_percentile'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['median'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['75_percentile'], 7) }}</td>
                                            <td class="text-right">{{ number_format($stats['max'], 7) }}</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td><strong>Count</strong></td>
                                            <td class="text-right">{{ number_format($stats['count'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mean</strong></td>
                                            <td class="text-right">{{ number_format($stats['mean'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Standard Deviation (Std)</strong></td>
                                            <td class="text-right">{{ number_format($stats['std'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Minimum</strong></td>
                                            <td class="text-right">{{ number_format($stats['min'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>25th Percentile</strong></td>
                                            <td class="text-right">{{ number_format($stats['25_percentile'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Median (50th Percentile)</strong></td>
                                            <td class="text-right">{{ number_format($stats['median'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>75th Percentile</strong></td>
                                            <td class="text-right">{{ number_format($stats['75_percentile'], 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Maximum</strong></td>
                                            <td class="text-right">{{ number_format($stats['max'], 7) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>ADF</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                            <h2>ACF</h2>
                            <ul>
                                @foreach ($acf as $index => $value)
                                    <li>Lag {{ $index + 1 }}: {{ $value }}</li>
                                @endforeach
                            </ul>

                            <h2>PACF</h2>
                            <ul>
                                @foreach ($pacf as $index => $value)
                                    <li>Lag {{ $index + 1 }}: {{ $value }}</li>
                                @endforeach
                            </ul>

                            <h2>ADF Test Result</h2>
                            <table>
                                <tr>
                                    <th>ADF Statistic</th>
                                    <td>{{ $adf_result['adf_statistic'] }}</td>
                                </tr>
                                <tr>
                                    <th>Lag Order</th>
                                    <td>{{ $adf_result['lag_order'] }}</td>
                                </tr>
                                <tr>
                                    <th>P-Value</th>
                                    <td>{{ $adf_result['p_value'] }}</td>
                                </tr>
                                <tr>
                                    <th>Stationary</th>
                                    <td>{{ $adf_result['is_stationary'] ? 'Yes' : 'No' }}</td>
                                </tr>
                            </table>

                                <h4>Autocorrelation Function (ACF):</h4>
                                <ul>
                                    @foreach ($acf as $lag => $value)
                                        <li>Lag {{ $lag }}: {{ $value }}</li>
                                    @endforeach
                                </ul>

                                <h4>Partial Autocorrelation Function (PACF):</h4>
                                <ul>
                                    @foreach ($pacf as $lag => $value)
                                        <li>Lag {{ $lag }}: {{ $value }}</li>
                                    @endforeach
                                </ul>

                                <h4>Augmented Dickey-Fuller Test (ADF):</h4>
                                <ul>
                                    <li>ADF Statistic: {{ $adf_result['adf_statistic'] }}</li>
                                    <li>Critical Value: {{ $adf_result['critical_value'] }}</li>
                                    <li>
                                        @if ($adf_result['adf_statistic'] < $adf_result['critical_value'])
                                            Data is stationary (reject null hypothesis)
                                        @else
                                            Data is not stationary (fail to reject null hypothesis)
                                        @endif
                                    </li>
                                </ul>
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Statistic</th>
                                            <th class="text-center">Lag Order</th>
                                            <th class="text-center">P-Value</th>
                                            <th class="text-center">Conclusion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center">ADF</th>
                                            <th class="text-center">Lag Order</th>
                                            <th class="text-center">P-Value</th>
                                            <th class="text-center">Conclusion</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right">{{ number_format($adf_statistic, 4) }}</td>
                                            <td class="text-right">{{ number_format($lag_order, 4) }}</td>
                                            <td class="text-right">{{ number_format($p_value, 4) }}</td>
                                            <td class="text-center">{{ $conclusion }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>ACF & PACF</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Lag</th>
                                            <th class="text-center">ACF</th>
                                            <th class="text-center">PACF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center">Lag</th>
                                            <th class="text-center">ACF</th>
                                            <th class="text-center">PACF</th>
                                        </tr>
                                        @for ($i = 0; $i < 30; $i++)
                                            <tr>
                                                <td >{{ $i + 1 }}</td>
                                                <td class="text-right">{{ isset($acf[$i]) ? number_format($acf[$i], 3) : '' }}</td>
                                                <td class="text-right">{{ isset($pacf[$i]) ? number_format($pacf[$i], 3) : '' }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}

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
