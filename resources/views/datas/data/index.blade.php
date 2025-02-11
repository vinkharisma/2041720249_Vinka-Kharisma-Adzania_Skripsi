@extends('layouts.app')

@section('content')
    <!-- Main Content -->
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
                            <h4>Pallet Stock Data Table</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('data.create') }}">Create New
                                    Data</a>
                                <a class="btn btn-icon btn-primary import" style="color: #ffff">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import Data</a>
                                <a class="btn btn-icon btn-primary" href="{{ route('data.export') }}">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export Data</a>
                                <a class="btn btn-icon btn-primary search" style="color: #ffff">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search Data</a>
                                <!-- Tombol Forecasting -->
                                <a class="btn btn-info btn-primary" href="{{ route('result.index') }}" style="color: #ffff">Forecasting</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-import mb-4" style="display: none">
                                <div class="custom-file">
                                    <form action="{{ route('data.import') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row" style="padding-left: 5px !important;">
                                            <div class="form-group col-md-10">
                                                <label class="custom-file-label" for="file-upload">Choose File</label>
                                                <input type="file" id="file-upload" class="custom-file-input" name="file" required="required" accept=".xlsx,.xls">
                                            </div>
                                                <div style="padding-left: 0px; padding-right: 15px; padding-top: 4px;" class="form-group col-md-2 text-right">
                                                    <button class="btn btn-primary">Import File</button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('data.index') }}">
                                    <div class="form-row" style="padding-left: 5px; align-items: center;">
                                        <!-- Data Name Input -->
                                        <div class="form-group col-md-5" style="padding-left: 0px; padding-right: 15px;">
                                            <label for="name" class="sr-only">Description</label>
                                            <input style="width: 100%;" type="text" name="name" class="form-control" id="name" placeholder="Description">
                                        </div>

                                        <!-- Tanggal Input -->
                                        <div class="form-group col-md-5" style="padding-left: 0px; padding-right: 15px;">
                                            <label for="tanggal" class="sr-only">Date</label>
                                            <input style="width: 100%;" type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Date (YYYY, YYYY-MM, YYYY-MM-DD)">
                                        </div>

                                        <!-- Submit and Reset Buttons -->
                                        <div class="form-group col-md-2 text-right" style="padding-left: 0px; padding-right: 15px;">
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('data.index') }}">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Initial Stock</th>
                                            <th class="text-center">In</th>
                                            <th class="text-center">Out</th>
                                            <th class="text-center">Ending Stock</th>
                                            <th class="text-center">Stock Quantity of Good Pallets</th>
                                            <th class="text-center">Stock Quantity of Damaged Pallets</th>
                                            {{-- <th>Created At</th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>

                                        @foreach ($datas as $key => $data)
                                            <tr>
                                                <td class="text-center">{{ ($datas->currentPage() - 1) * $datas->perPage() + $key + 1 }}</td>
                                                {{-- <td>{{ $data->tanggal }}</td> --}}
                                                <td>{{ $data->formatted_tanggal }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td class="text-right">{{ $data->stok_awal }}</td>
                                                <td class="text-right">{{ $data->masuk }}</td>
                                                <td class="text-right">{{ $data->keluar }}</td>
                                                <td class="text-right">{{ $data->stok_akhir }}</td>
                                                <td class="text-right">{{ $data->jumlah_stok_palet_baik }}</td>
                                                <td class="text-right">{{ $data->jumlah_stok_palet_rusak}}</td>
                                                {{-- <td>{{ $data->created_at}}</td> --}}

                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('data.edit', $data->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('data.destroy', $data->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $datas->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            // Ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
@endpush

@push('customStyle')
    {{-- <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css"> --}}
@endpush
