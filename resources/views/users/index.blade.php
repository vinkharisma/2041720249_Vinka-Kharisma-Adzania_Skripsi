@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/user-management/user">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">User Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>User Data Table</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('user.create') }}">Create New
                                    User</a>
                                {{-- <a class="btn btn-info btn-primary active import">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import User</a> --}}
                                <a class="btn btn-icon btn-primary" href="{{ route('data.export') }}">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export Data</a>
                                <a class="btn btn-icon btn-primary search" style="color: #ffff">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-import mb-4" style="display: none">
                                <div class="custom-file">
                                    <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label class="custom-file-label" for="file-upload">Choose File</label>
                                                <input style="width: 1050px" type="file" id="file-upload" class="custom-file-input" name="file" required="required" accept=".xlsx,.xls">
                                            </div>
                                            <div class="form-group col-md-2 text-center">
                                                <button class="btn btn-primary" style="padding-top: 7.5px; padding-bottom: 7.5px;">Import File</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('user.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" name="search" class="form-control" id="search" placeholder="Search by Name, Email, Employee Number, Department, Phone Number">
                                        </div>
                                        <div class="form-group col-md-2 text-right" style="padding-left: 0px; padding-right: 15px;">
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('user.index') }}">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Employee Number</th>
                                            <th>Department</th>
                                            <th>Phone Number</th>
                                            {{-- <th>Created At</th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>

                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->no_pegawai }}</td>
                                                <td>{{ $user->departemen }}</td>
                                                <td>{{ $user->no_hp }}</td>
                                                {{-- <td>{{ $user->created_at }}</td> --}}

                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        {{-- <form action="{{ route('user.destroy', $user->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form> --}}
                                                        {{-- @if (!$user->hasRole('ppic'))
                                                            <form action="{{ route('user.destroy', $user->id) }}"
                                                                method="POST" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-sm btn-danger btn-icon" disabled>
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        @endif --}}
                                                        @if ($user->roles->contains('name', 'ppic'))
                                                            <!-- User memiliki role 'ppic', tombol delete tidak muncul -->
                                                        @else
                                                            <!-- Tampilkan tombol delete jika user bukan 'ppic' -->
                                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $users->withQueryString()->links() }}
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
