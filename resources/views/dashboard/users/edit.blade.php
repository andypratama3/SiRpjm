@extends('layouts.dashboard.dashboard')
@section('title', 'Edit User')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Edit User</h5>
        </div>
        <div class="card-body mt-0">
            <div class="row">
                <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $user->name }}" placeholder="Nama">
                    </div>
                    <div class="col-md-12">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') ?? $user->jabatan }}" placeholder="Jabatan">
                    </div>
                    <div class="col-md-12">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="text" name="nomor" class="form-control" value="{{ old('nomor') ?? $user->nomor }}" placeholder="Nomor">
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') ?? $user->email }}" placeholder="Email">
                    </div>
                    <div class="col-md-12">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="" class="form-control">
                            <option disabled selected>Pilih Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mt-4">
                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

