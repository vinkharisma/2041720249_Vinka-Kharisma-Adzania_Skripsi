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
                        <img src="{{ asset('/assets/img/pallet3.png') }}"
                            style="width: 70px !important; height: 70px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Stok Palet Awal Kosong</h4>
                            <div class="card-body">
                                {{ $stok_awal }}
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
                    <div class="card-icon bg-warning" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="{{ asset('/assets/img/pallet4.png') }}"
                            style="width: 60px !important; height: 60px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Stok Palet Akhir Kosong</h4>
                            <div class="card-body">
                                {{ $stok_akhir }}
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
                    <div class="card-icon bg-success" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="{{ asset('/assets/img/check.png') }}"
                            style="width: 55px !important; height: 55px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            <h4>Palet Baik Kosong</h4>
                            <div class="card-body">
                                {{ $jumlah_stok_palet_baik }}
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
                            <h4>Palet Rusak Kosong</h4>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4>Total Kebutuhan Palet Kayu Per Bulan</h4> --}}
                        <h4>Grafik Stok Akhir</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                              {{-- <a href="#" class="btn btn-primary">Month</a>
                              <a href="#" class="btn">Year</a> --}}
                            </div>
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
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Tempatkan canvas untuk grafik di sini -->
                        {{-- <canvas id="myChart" height="80"></canvas> --}}

                        {{-- {!! $chart->container() !!} --}}
                        {!! $chartStokAkhir->container() !!}
                        {{-- {!! $chartPaletKosong->container() !!} --}}
                        {{-- {!! $chartPaletTerpakai->container() !!} --}}
                        {!! $chartPrediksi->container() !!}

                    </div>
                </div>
            </div>

            {{-- <!-- Memuat jQuery jika diperlukan -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Memuat Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <!-- Kode JavaScript untuk membuat grafik -->
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    datasets: [{
                      label: 'Statistics',
                      data: [460, 458, 330, 502, 430, 610, 488],
                      borderWidth: 2,
                      backgroundColor: '#6777ef',
                      borderColor: '#6777ef',
                      borderWidth: 2.5,
                      pointBackgroundColor: '#ffffff',
                      pointRadius: 4
                    }]
                  },
                  options: {
                    legend: {
                      display: false
                    },
                    scales: {
                      yAxes: [{
                        gridLines: {
                          drawBorder: false,
                          color: '#f2f2f2',
                        },
                        ticks: {
                          beginAtZero: true,
                          stepSize: 150
                        }
                      }],
                      xAxes: [{
                        ticks: {
                          display: false
                        },
                        gridLines: {
                          display: false
                        }
                      }]
                    },
                  }
                });
            </script> --}}

            {{-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                          <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                            <div class="media-body">
                              <div class="float-right text-primary">Now</div>
                              <div class="media-title">Farhan A Mujib</div>
                              <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                            </div>
                          </li>
                          <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png" alt="avatar">
                            <div class="media-body">
                              <div class="float-right">12m</div>
                              <div class="media-title">Ujang Maman</div>
                              <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                            </div>
                          </li>
                          <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-3.png" alt="avatar">
                            <div class="media-body">
                              <div class="float-right">17m</div>
                              <div class="media-title">Rizal Fakhri</div>
                              <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                            </div>
                          </li>
                          <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-4.png" alt="avatar">
                            <div class="media-body">
                              <div class="float-right">21m</div>
                              <div class="media-title">Alfa Zulkarnain</div>
                              <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                            </div>
                          </li>
                        </ul>
                        <div class="text-center pt-1 pb-1">
                          <a href="#" class="btn btn-primary btn-lg btn-round">
                            View All
                          </a>
                        </div>
                      </div>
                </div>
            </div> --}}
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
                            <li><strong>Stok Awal : </strong></li>
                            <ul>
                                <li>Jumlah stok palet kayu yang tersedia pada awal shift</li>
                            </ul>
                            <li><strong>Stok Akhir : </strong></li>
                            <ul>
                                <li>Jumlah stok palet kayu pada akhir shift tersebut</li>
                            </ul>
                            <li><strong>Kondisi Palet Kosong : </strong></li>
                            <ul>
                                <li>Kondisi dimana palet tersebut tidak terdapat produk dan digunakan untuk buffer stok palet</li>
                            </ul>
                            <li><strong>Kondisi Palet Terpakai : </strong></li>
                            <ul>
                                <li>Palet yang digunakan untuk penyimpanan produk ALF-3</li>
                            </ul>
                            <li><strong>Kondisi Baik : </strong></li>
                            <ul>
                                <li>Jumlah antara kondisi palet terpakai ditambah palet kosong</li>
                            </ul>
                            <li><strong>Kondisi Rusak : </strong></li>
                            <ul>
                                <li>Jumlah kondisi pallet yang rusak</li>
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
@push('customScript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['November 2020', 'December 2020', 'January 2021', 'February 2021', 'March 2021', 'April 2021', 'May 2021', 'June 2021', 'July 2021', 'August 2021', 'September 2021', 'October 2021', 'November 2021', 'December 2021', 'January 2022', 'February 2022', 'March 2022', 'April 2022', 'May 2022', 'June 2022', 'July 2022', 'August 2022', 'September 2022', 'October 2022', 'November 2022', 'December 2022', 'January 2023', 'February 2023', 'March 2023', 'April 2023', 'May 2023', 'June 2023', 'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023'],
                    datasets: [{
                        label: 'Stok Awal',
                        data: [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000, 3100, 3200, 3300, 3400, 3500, 3600, 3700, 3800],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4
                    },
                    {
                        label: 'Stok Akhir',
                        data: [0, 120, 220, 320, 420, 520, 620, 720, 820, 920, 1020, 1120, 1220, 1320, 1420, 1520, 1620, 1720, 1820, 1920, 2020, 2120, 2220, 2320, 2420, 2520, 2620, 2720, 2820, 2920, 3020, 3120, 3220, 3320, 3420, 3520, 3620, 3720, 3820],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {
                                    return Number(value.toFixed(0)); // Menampilkan nilai bulat tanpa desimal
                                }
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endpush
