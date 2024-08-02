@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Predict Pallet Stock</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-management/data">Components</a></div>
                <div class="breadcrumb-item">Predict</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Enter Data for Prediction</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Prediction Input Form</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('result.predict') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="stok_akhir">Stok Akhir</label>
                                    <input type="text" class="form-control" id="stok_akhir" name="stok_akhir" value="{{ old('stok_akhir') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Predict</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
@endpush
