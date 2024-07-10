@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Prediction Algorithm</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/data">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data Preparation</h4>
                            <div class="card-header-action"></div>
                        </div>
                        <div class="card-body">
                            <div class="show-import mb-4" style="display: none">
                                <div class="custom-file"></div>
                            </div>
                            <div class="show-search mb-3" style="display: none"></div>
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong> Data Harian </strong></p>
                                        <table class="table table-bordered table-md">
                                            <thead>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Stok Akhir</th>
                                                </tr>
                                                <!-- Data per hari akan dimasukkan di sini -->
                                                <tr>
                                                    <td>2020-11-01</td>
                                                    <td>105</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-02</td>
                                                    <td>187</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-03</td>
                                                    <td>187</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-04</td>
                                                    <td>320</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-05</td>
                                                    <td>320</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong> Data Mingguan </strong></p>
                                        <table class="table table-bordered table-md">
                                            <thead>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <th>Minggu</th>
                                                    <th>Stok Akhir</th>
                                                </tr>
                                                <!-- Data per minggu akan dimasukkan di sini -->
                                                <tr>
                                                    <td>2020-11-01</td>
                                                    <td>1694</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-08</td>
                                                    <td>1801</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-15</td>
                                                    <td>2195</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-22</td>
                                                    <td>2279</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-11-29</td>
                                                    <td>2176</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Uji Stasioneritas</h4>
                            <div class="card-header-action"></div>
                        </div>
                        <div class="card-body">
                            <p style="font-weight: bold;">Stasioneritas Varian (Transformasi Box-Cox untuk data) \( Z_t \) adalah:</p>
                            <div class="formula-container" style="width: 200px !important;">
                                \[
                                T(Z_t) =
                                \begin{cases}
                                \frac{Z_t^\lambda - 1}{\lambda} & \text{jika } \lambda \neq 0 \\
                                \log(Z_t) & \text{jika } \lambda = 0
                                \end{cases}
                                \]
                            </div>
                            <p style="margin-top: 20px;">Di mana:</p>
                            <ul>
                                <li><strong>\(\lambda\)</strong> adalah parameter transformasi Box-Cox yang menentukan jenis transformasi yang diterapkan.</li>
                                <li><strong>\(Z_t\)</strong> adalah nilai data yang akan ditransformasikan.</li>
                                <li>Jika <strong>\(\lambda = 0\)</strong>, transformasi logaritma digunakan.</li>
                                <li>Jika <strong>\(\lambda \neq 0\)</strong>, transformasi merupakan fungsi pangkat dengan <strong>\(\lambda\)</strong> sebagai pangkat.</li>
                            </ul>

                            <p style="font-weight: bold; margin-top: 20px;">Stasioneritas Rataan (Augmented Dickey-Fuller):</p>
                            <div style="margin-top: 10px; text-align: left; width: 200px !important;">
                                \[
                                \Delta y_t = \alpha + \beta t + \gamma y_{t-1} + \sum_{i=1}^p \phi_i \Delta y_{t-i} + \epsilon_t
                                \]
                            </div>
                            <p style="margin-top: 10px;">Di mana:</p>
                            <ul>
                                <li>\(\Delta y_t\) adalah perubahan pertama dari \( y_t \),</li>
                                <li>\(\alpha\) adalah intercept,</li>
                                <li>\(\beta\) adalah koefisien tren,</li>
                                <li>\(\gamma\) adalah koefisien dari lag \( y_{t-1} \),</li>
                                <li>\(\phi_i\) adalah koefisien autoregressive, dan</li>
                                <li>\(\epsilon_t\) adalah error term.</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
@endpush
