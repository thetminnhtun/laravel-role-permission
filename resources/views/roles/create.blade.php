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
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="permissions[]" type="checkbox"
                                        id="{{ $permission->name }}" value="{{ $permission->id }}">
                                    <label class="form-check-label"
                                        for="{{ $permission->name }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                            <div class="w-100 mt-4"></div>
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('roles.index') }}" class="ml-2 btn btn-outline-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
