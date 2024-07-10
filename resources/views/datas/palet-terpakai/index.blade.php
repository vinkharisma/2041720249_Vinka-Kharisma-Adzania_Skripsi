@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Stok Data List - Terpakai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/palet-terpakai">Components</a></div>
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
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('palet-terpakai.create') }}">Create New
                                    Data</a>
                                <a class="btn btn-icon btn-primary import" style="color: #ffff">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import Data</a>
                                {{-- <a class="btn btn-icon btn-primary" href="{{ route('palet-terpakai.export') }}">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export Data</a> --}}
                                <a class="btn btn-icon btn-primary search" style="color: #ffff">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search Data</a>
                                <a class="btn btn-info btn-primary" href="{{ route('datas.prediction', ['type' => 'palet-terpakai']) }}" style="color: #ffff">Forecasting</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-import mb-4" style="display: none">
                                <div class="custom-file">
                                    <form action="{{ route('palet-terpakai.import') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row" style="margin-left: 0px; margin-right: 0px;">
                                            <div class="form-group col-md-10">
                                                <label style="width: 1126px" class="custom-file-label" for="file-upload">Choose File</label>
                                                <input style="width: 1050px" type="file" id="file-upload" class="custom-file-input" name="file" required="required" accept=".xlsx,.xls">
                                            </div>
                                                <div style="padding-left: 90px; padding-top: 4px;" class="footer text-right">
                                                    <button class="btn btn-primary">Import File</button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('palet-terpakai.index') }}">
                                    <div class="form-row" style="padding-left: 5px;">
                                        <div class="form-group col-md-10" style="padding-left: 0px; padding-right: 0px;">
                                            <label for="role">Data</label>
                                            <input style="width: 1032px" type="text" name="name" class="form-control" id="name" placeholder="Data Name">
                                        </div>
                                        <div class="text-right" style="padding-top: 30px">
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('palet-terpakai.index') }}">Reset</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Stok Awal</th>
                                            <th class="text-center">Masuk</th>
                                            <th class="text-center">Keluar</th>
                                            <th class="text-center">Stok Akhir</th>
                                            <th class="text-center">Jumlah Stok Palet Baik</th>
                                            <th class="text-center">Jumlah Stok Palet Rusak</th>
                                            {{-- <th>Created At</th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>

                                        @foreach ($palet_terpakais as $key => $palet_terpakai)
                                            <tr>
                                                <td class="text-center">{{ ($palet_terpakais->currentPage() - 1) * $palet_terpakais->perPage() + $key + 1 }}</td>
                                                <td>{{ $palet_terpakai->tanggal }}</td>
                                                <td>{{ $palet_terpakai->name }}</td>
                                                <td class="text-right">{{ $palet_terpakai->stok_awal }}</td>
                                                <td class="text-right">{{ $palet_terpakai->masuk }}</td>
                                                <td class="text-right">{{ $palet_terpakai->keluar }}</td>
                                                <td class="text-right">{{ $palet_terpakai->stok_akhir }}</td>
                                                <td class="text-right">{{ $palet_terpakai->jumlah_stok_palet_baik }}</td>
                                                <td class="text-right">{{ $palet_terpakai->jumlah_stok_palet_rusak}}</td>
                                                {{-- <td>{{ $data->created_at}}</td> --}}

                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('palet-terpakai.edit', $palet_terpakai->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('palet-terpakai.destroy', $palet_terpakai->id) }}"
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
                                    {{ $palet_terpakais->withQueryString()->links() }}
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
@endpush
