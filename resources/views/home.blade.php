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
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                      10
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>News</h4>
                    </div>
                    <div class="card-body">
                      42
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Reports</h4>
                    </div>
                    <div class="card-body">
                      1,201
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Online Users</h4>
                    </div>
                    <div class="card-body">
                      47
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistic</h4>
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

            <div class="col-md-3">
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
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
@endsection
