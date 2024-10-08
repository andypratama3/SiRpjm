@extends('layouts.dashboard.dashboard')
@section('title', 'Home')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Hasil Usul</h5>
            @can('mengusulkan-create')
                <a href="{{ route('dashboard.usul.create') }}" class="btn btn-primary btn-sm">Tambah Usul</a>
                <a href="{{ route('print.hasil.usul') }}" class="btn btn-primary btn-sm">Print Hasil</a>

            @endcan
        </div>
        <div class="card-body mt-0">

            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 text-center">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Gagasan Kegiatan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Lokasi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Volume</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Satuan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Jabatan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nomor</th>

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Biaya Tafsiran</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tahun Prioritas</th>

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Status</th>

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuls as $usul)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ ++$no }}</p>
                            </td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->name }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->lokasi }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->volume }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->satuan }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->user->jabatan }}</p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->user->nomor }}</p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->biaya }}</p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $usul->tahun_prioritas }}</p></td>

                            <td>
                                @if ($usul->status == 'DiTerima')
                            <span class="badge badge-sm bg-gradient-success">Di Terima</span>
                            @elseif ($usul->status == 'DiTolak')
                                <span class="badge badge-sm bg-gradient-danger">Di Tolak</span>
                            @else
                                <span class="badge badge-sm bg-gradient-warning">Menunggu</span>
                            @endif
                                </p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                    @can('mengusulkan-show')
                                    <a href="{{ route('dashboard.hasil.usul.show', $usul->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                    @endcan
                                    @can('mengusulkan-delete')
                                    <a href="#" data-id="{{ $usul->id }}" class="btn btn-danger btn-sm delete">
                                        Hapus
                                        <form action="{{ route('dashboard.hasil.usul.destroy', $usul->id) }}"
                                            id="delete-{{ $usul->id }}" method="POST" enctype="multipart/form-data" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
                                    @endcan
                                </p>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-rounded justify-content-end mb-0">
                    {{ $usuls->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
