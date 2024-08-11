@extends('layouts.dashboard.dashboard')
@section('title', 'Detail Usul')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Detail Usul</h5>
        </div>
        <div class="card-body mt-0">
            <div class="row">
                <form>
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">Gagasan Kegiatan</label>
                        <input type="text" name="name" class="form-control" value="{{ $usul->name }}" placeholder="Gagasan Kegiatan" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ $usul->lokasi }}" placeholder="Lokasi" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="volume" class="form-label">Volume</label>
                        <input type="text" name="volume" class="form-control" value="{{ $usul->volume }}" placeholder="volume" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="{{ $usul->satuan }}" placeholder="Satuan" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="status" class="form-label">status</label>
                        <div class="col-md-6">
                            @if ($usul->status == 'DiTerima')
                            <span class="badge badge-sm bg-gradient-success">Di Terima</span>
                        @elseif ($usul->status == 'DiTolak')
                            <span class="badge badge-sm bg-gradient-danger">Di Tolak</span>
                        @else
                            <span class="badge badge-sm bg-gradient-warning">Menunggu</span>
                        @endif
                        </div>

                    </div>
                    <div class="col-md-12 mt-4">
                        <a href="{{ route('dashboard.usul.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

