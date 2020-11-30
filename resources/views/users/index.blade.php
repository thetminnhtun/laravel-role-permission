@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @can('user_create')
                    <a href="{{ route('users.create') }}" class="btn btn-primary ">
                        Create
                    </a>
                @endcan
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @can('user_edit')
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-success ">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('user_delete')
                                        <button
                                            onclick="$('#user_{{ $user->id }}').submit()"
                                            class="btn btn-danger">
                                            Delete
                                        </button>
                                        <form id="user_{{ $user->id }}"
                                            action="{{ route('users.destroy', $user->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            No users.
                        @endforelse
                    </tbody>
                    <tfoot>
                        {{ $users->links() }}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
