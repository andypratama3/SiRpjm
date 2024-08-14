@extends('layouts.dashboard.dashboard')
@section('title', 'Edit Usul')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Edit Usul</h5>
        </div>
        <div class="card-body mt-0">
            <div class="row">
                <form action="{{ route('dashboard.usul.update', $usul->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="name" class="form-label">Gagasan Kegiatan</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $usul->name }}" placeholder="Gagasan Kegiatan">
                    </div>

                    <div class="col-md-12">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') ?? $usul->lokasi }}" placeholder="Lokasi">
                    </div>

                    <div class="col-md-12">
                        <label for="volume" class="form-label">Volume</label>
                        <input type="text" name="volume" class="form-control" value="{{ old('volume') ?? $usul->volume }}" placeholder="volume">
                    </div>

                    <div class="col-md-12">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="{{ old('satuan') ?? $usul->satuan }}" placeholder="Satuan">
                    </div>


                    <div class="col-md-12">
                        <label for="biaya" class="form-label">Biaya Tafsiran</label>
                        <input type="text" name="biaya" class="form-control" id="biaya" value="{{ old('biaya', $usul->biaya) }}" placeholder="biaya">
                    </div>

                    @can('mengusulkan-status')
                    <div class="col-md-12">
                        <label for="status" class="form-label">status</label>
                        <select name="status" id="" class="form-control">
                            <option value="menunggu" {{ $usul->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="DiTolak" {{ $usul->status == 'DiTolak' ? 'selected' : '' }}>Di Tolak</option>
                            <option value="DiTerima" {{ $usul->status == 'DiTerima' ? 'selected' : '' }}>Di Terima</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="Tahun" class="form-label">Tahun Prioritas</label>
                        {{-- input year  --}}
                        <input type="text" name="tahun_prioritas" class="form-control" value="{{ old('tahun_prioritas') ?? $usul->tahun_prioritas }}" placeholder="Tahun Prioritas">
                    </div>
                    @endcan
                    <div class="col-md-12 mt-4">
                        <a href="{{ route('dashboard.usul.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
         $(document).ready(function () {
        $('#biaya').on('input', function () {
        let biaya = $(this).val();
            biaya = biaya.replace(/[^0-9.]/g, '');
            biaya = formatRupiah(biaya);
            $(this).val(biaya);
        });

        // Fungsi untuk memformat angka sebagai mata uang Rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;

        }
    });
    </script>
@endpush
@endsection

