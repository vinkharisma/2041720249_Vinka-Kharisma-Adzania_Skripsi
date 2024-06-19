@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit User Data</h2>
            <div class="card">
                <form action="{{ route('user.update', $user) }}" method="POST">
                    <div class="card-header">
                        <h4>Edit User Data Form</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        {{-- Your Name --}}
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $user->name }}">
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
                                name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- No Pegawai --}}
                        <div class="form-group">
                            <label for="no_pegawai">No Pegawai</label>
                            <input type="text" class="form-control @error('no_pegawai') is-invalid @enderror" id="no_pegawai"
                                name="no_pegawai" value="{{ $user->no_pegawai }}">
                            @error('no_pegawai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Departemen --}}
                        <div class="form-group">
                            <label for="departemen">Departemen</label>
                            <input type="text" class="form-control @error('departemen') is-invalid @enderror" id="departemen"
                                name="departemen" value="{{ $user->departemen }}">
                            @error('departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- No HP --}}
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" value="{{ $user->no_hp }}">
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
