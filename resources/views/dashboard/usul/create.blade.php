@extends('layouts.dashboard.dashboard')
@section('title', 'Tambah Usul')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Tambah Usul</h5>
        </div>
        <div class="card-body mt-0">
            <div class="row">
                <form action="{{ route('dashboard.usul.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">Gagasan Kegiatan</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Gagasan Kegiatan">
                    </div>

                    <div class="col-md-12">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" placeholder="Lokasi">
                    </div>

                    <div class="col-md-12">
                        <label for="volume" class="form-label">Volume</label>
                        <input type="text" name="volume" class="form-control" value="{{ old('Volume') }}" placeholder="volume">
                    </div>

                    <div class="col-md-12">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="{{ old('satuan') }}" placeholder="Satuan">
                    </div>

                    <div class="col-md-12 mt-4">
                        <a href="{{ route('dashboard.usul.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
