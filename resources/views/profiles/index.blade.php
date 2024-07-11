@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}!</h2>
            {{-- <p class="section-lead">
              Change information about yourself on this page.
            </p> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-5">
                                <div class="card profile-widget">
                                    <div class="profile-widget-header" style="display: flex; justify-content: center; align-items: center;">
                                        <img style="width: 200px" alt="image" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                                    </div>
                                    <div class="profile-widget-description">
                                        <div style="display: flex; justify-content: center; align-items: center;" class="profile-widget-name">{{ $user->name }}
                                            <div class="text-muted d-inline font-weight-normal">
                                                <div class="slash"></div> Web Developer
                                            </div>
                                        </div>
                                        {{-- Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>. --}}
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="font-weight-bold mb-2">Follow {{ $user->name }} On</div>
                                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                                <i class="fab fa-github"></i>
                                            </a>
                                            <a href="#" class="btn btn-social-icon btn-instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7">
                                    <div class="card">
                                        <form method="post" class="needs-validation" novalidate="">
                                        <div class="card-header">
                                            <h4>Profile {{ $user->name }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- Name --}}
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Name</label>
                                                    <span class="form-control">{{ $user->name }}</span>
                                                    <div class="invalid-feedback">
                                                        Please fill in the first name
                                                    </div>
                                                </div>
                                                {{-- No Pegawai --}}
                                                <div class="form-group col-md-6 col-12">
                                                    <label>No Pegawai</label>
                                                    <span class="form-control">{{ $user->no_pegawai }}</span>
                                                    <div class="invalid-feedback">
                                                        Please fill in the last name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- Email --}}
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Email</label>
                                                    <span class="form-control">{{ $user->email }}</span>
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                                {{-- Departemen --}}
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Departemen</label>
                                                    <span class="form-control">{{ $user->departemen }}</span>
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- No HP --}}
                                                <div class="form-group col-md-6 col-12">
                                                    <label>No HP</label>
                                                    <span class="form-control">{{ $user->no_hp }}</span>
                                                    <div class="invalid-feedback">
                                                        Please fill in the last name
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="form-group col-12">
                                                    <label>Bio</label>
                                                    <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group mb-0 col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                                        <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                                        <div class="text-muted form-text">
                                                            You will get new information about products, offers and promotions
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
