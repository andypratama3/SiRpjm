@extends('layouts.dashboard.dashboard')
@section('title', 'Role')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Role</h5>
            <a href="{{ route('dashboard.role.crate') }}" class="btn btn-primary btn-sm">Tambah Role</a>
        </div>
        <div class="card-body mt-0">
            <div class="table-responsive">
                <table class="table table-flush text-center" id="datatable-buttons">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="javascript: void(0);">Rabat Beton</a></td>
                            <td>01/07</td>
                            <td>100x2</td>
                            <td>Meter</td>
                            <td>
                                <a href="javascript: void(0);" class="btn btn-secondary btn-sm">lihat</a>
                                <a href="javascript: void(0);" class="btn btn-success btn-sm">edit</a>
                                <a href="javascript: void(0);" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
