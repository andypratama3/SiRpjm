@extends('layouts.dashboard.dashboard')
@section('title', 'Tambah Role')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header mb-0 pt-3 pb-0">
            <h5 class="card-title">Halaman Tambah Role</h5>
        </div>
        <div class="card-body mt-0">
            <div class="row">
                <form action="{{ route('dashboard.role.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nama Role</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Role">
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <div>
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}">
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
