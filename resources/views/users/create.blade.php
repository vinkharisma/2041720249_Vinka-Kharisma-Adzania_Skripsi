@extends('layouts.app')

@section('content')

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
            <h2 class="section-title">Create User Data</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Create User Data Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf

                        {{-- Your Name --}}
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter User Name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Enter User Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Enter User Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- No Pegawai --}}
                        <div class="form-group">
                            <label for="no_pegawai">Employee Number</label>
                            <input type="text" class="form-control @error('no_pegawai') is-invalid @enderror" id="no_pegawai"
                                name="no_pegawai" placeholder="Enter Employee Number">
                            @error('no_pegawai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Departemen --}}
                        <div class="form-group">
                            <label for="departemen">Department</label>
                            <input type="text" class="form-control @error('departemen') is-invalid @enderror" id="departemen"
                                name="departemen" placeholder="Enter Department">
                            @error('departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- No HP --}}
                        <div class="form-group">
                            <label for="no_hp">Phone Number</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" placeholder="Enter Phone Number">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('user.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
