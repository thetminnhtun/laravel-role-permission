@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @can('role_create')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
                        Create
                    </a>
                @endcan
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ implode(', ', $role->getPermissionNames()->toArray()) }}
                                </td>
                                <td>
                                    @can('role_edit')
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="btn btn-success">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('role_delete')
                                        <button
                                            onclick="$('#role_{{ $role->id }}').submit()"
                                            class="btn btn-danger">
                                            Delete
                                        </button>
                                        <form id="role_{{ $role->id }}"
                                            action="{{ route('roles.destroy', $role->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            No roles.
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
