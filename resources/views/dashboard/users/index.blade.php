@extends('layouts.dashboard.dashboard')
@section('title', 'Home')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman List User</h5>
        </div>
        <div class="card-body mt-0">

            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Jabatan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nomor</th>

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ ++$no }}</p>
                            </td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $user->name }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $user->email }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $user->jabatan }} </p></td>
                            <td> <p class="text-xs font-weight-bold mb-0">{{ $user->nomor }} </p></td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="#" data-id="{{ $user->id }}" class="btn btn-danger btn-sm delete">
                                        Hapus
                                        <form action="{{ route('dashboard.users.destroy', $user->id) }}"
                                            id="delete-{{ $user->id }}" method="POST" enctype="multipart/form-data" style="display: none;">
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
