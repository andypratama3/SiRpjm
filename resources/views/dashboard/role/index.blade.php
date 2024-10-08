@extends('layouts.dashboard.dashboard')
@section('title', 'Role')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman List Role</h5>
                <a href="{{ route('dashboard.role.create') }}" class="btn btn-primary btn-sm">Tambah Role</a>
        </div>
        <div class="card-body mt-0">

            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama Role</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ ++$no }}</p>
                            </td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $role->name }} </p></td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                        <a href="{{ route('dashboard.role.edit', $role->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="#" data-id="{{ $role->id }}" class="btn btn-danger btn-sm delete">
                                        Hapus
                                        <form action="{{ route('dashboard.role.destroy', $role->id) }}"
                                            id="delete-{{ $role->id }}" method="POST" enctype="multipart/form-data" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
                                </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
