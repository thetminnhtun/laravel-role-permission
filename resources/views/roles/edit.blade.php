@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="permissions[]" type="checkbox"
                                        id="{{ $permission->name }}" value="{{ $permission->id }}"
                                        {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="{{ $permission->name }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                            <div class="w-100 mt-4"></div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('roles.index') }}" class="ml-2 btn btn-outline-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
