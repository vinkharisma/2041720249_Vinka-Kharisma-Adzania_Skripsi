@extends('layouts.app')
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
                        <img src="../assets/img/pallet3.png"
                            style="width: 70px !important; height: 70px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            {{-- <h4>Stok Palet Awal Terpakai</h4>
                            <div class="card-body">
                                10
                            </div> --}}
                            <h4>Stok Palet Awal Kosong</h4>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="../assets/img/pallet4.png"
                            style="width: 60px !important; height: 60px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            {{-- <h4>Stok Palet Akhir Terpakai</h4>
                            <div class="card-body">
                                42
                            </div> --}}
                            <h4>Stok Palet Akhir Kosong</h4>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="../assets/img/check.png"
                            style="width: 55px !important; height: 55px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            {{-- <h4>Palet Baik Terpakai</h4>
                            <div class="card-body">
                                1,201
                            </div> --}}
                            <h4>Palet Baik Kosong</h4>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger" style="padding-top: 0px !important; margin-top: 10px !important; width: 90px !important; height: 90px !important; margin-left: 10px !important; margin-right: 10px !important;">
                        <img src="../assets/img/warning.png"
                            style="width: 55px !important; height: 55px !important; filter: invert(1); margin-bottom: 0px !important;"
                        >
                    </div>
                    <div class="card-wrap">
                        <div class="card-header" style="padding-top: 15px !important; border-bottom-left-radius: 3px !important; border-bottom-right-radius: 3px !important; padding-bottom: 10px !important;">
                            {{-- <h4>Palet Rusak Terpakai</h4>
                            <div class="card-body">
                                47
                            </div> --}}
                            <h4>Palet Rusak Kosong</h4>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Kebutuhan Palet Kayu Per Bulan</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                              <a href="#" class="btn btn-primary">Month</a>
                              <a href="#" class="btn">Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="182"></canvas>

                        <div class="statistic-details mt-sm-4">
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                <div class="detail-value">$243</div>
                                <div class="detail-name">Today's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                <div class="detail-value">$2,902</div>
                                <div class="detail-name">This Week's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                                <div class="detail-value">$12,821</div>
                                <div class="detail-name">This Month's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                <div class="detail-value">$92,142</div>
                                <div class="detail-name">This Year's Sales</div>
                            </div>
                        </div>
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
                            <li><strong>Kondisi Palet Terpakai : </strong></li>
                            <ul>
                                <li>Palet yang digunakan untuk penyimpanan produk ALF-3</li>
                            </ul>
                            <li><strong>Kondisi Palet Kosong : </strong></li>
                            <ul>
                                <li>Kondisi dimana palet tersebut tidak terdapat produk dan digunakan untuk buffer stok palet</li>
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
