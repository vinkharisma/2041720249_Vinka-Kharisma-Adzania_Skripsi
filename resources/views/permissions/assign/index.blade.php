@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Role and Permission</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/role-and-permission/assign">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Assign Role and Permission</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Role Assigned To Permission</h4>
                            <div class="card-header-action">
                                {{-- <a class="btn btn-icon icon-left btn-primary" href="{{ route('assign.create') }}"> Create Assign Permission To Role</a> --}}
                                {{-- <a class="btn btn-info btn-primary active search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search Permission</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('assign.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="role">Role</label>
                                            <input style="width: 1032px" type="text" name="name" class="form-control" id="name"
                                                placeholder="Role Name">
                                        </div>
                                        <div class="text-right" style="padding-top: 30px">
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('assign.index') }}">Reset</a>
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
                                            <th>Guard Name</th>
                                            <th>Permission</th>
                                            {{-- <th class="text-center">Action</th> --}}
                                        </tr>
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ $roles->firstItem() + $key }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->guard_name }}</td>
                                                <td>{{ implode(', ', $role->getPermissionNames()->toArray()) }}</td>

                                                {{-- <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('assign.edit', $role->id) }}"
                                                            class="btn btn-sm btn-info btn-icon"><i class="fas fa-edit"></i>
                                                            Edit</a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $roles->withQueryString()->links() }}
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
            //ganti label berdasarkan nama file
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
