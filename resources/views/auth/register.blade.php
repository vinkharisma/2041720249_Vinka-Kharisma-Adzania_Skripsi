<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} - Register</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/node_modules/selectric/public/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ ('/assets/img/pallet.png') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        {{-- Full Name --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="first_name">Full Name</label>
                                                <input id="first_name" type="text" name="name"
                                                    value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Lengkap" autofocus>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- No Pegawai --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="no_pegawai">No Pegawai</label>
                                                <input id="no_pegawai" type="text" name="no_pegawai"
                                                    class="form-control @error('no_pegawai') is-invalid @enderror"
                                                    placeholder="Masukkan No Pegawai">
                                                @error('no_pegawai')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Email --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Masukkan Alamat Email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Departemen --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="departemen">Departemen</label>
                                                <input id="departemen" type="text" name="departemen"
                                                    class="form-control @error('departemen') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Departemen">
                                                @error('departemen')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Password --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="password" class="d-block">Password</label>
                                                <input id="password" type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Masukkan Password" data-indicator="pwindicator">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- No HP --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="no_hp">No HP</label>
                                                <input id="no_hp" type="text" name="no_hp"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    placeholder="Masukkan No HP">
                                                @error('no_hp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Password Confirmation --}}
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="password_confirmation" class="d-block">Password Confirmation</label>
                                                <input id="password_confirmation" name="password_confirmation"
                                                    type="password" class="form-control"
                                                    placeholder="Masukkan Konfirmasi Password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            {{-- Copyright &copy; Stisla 2018 --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ ('/assets/js/scripts.js') }}"></script>
    <script src="{{ ('/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ ('/assets/js/page/auth-register.js') }}"></script>
</body>

</html>
