@extends('templet.layouts.app')

@section('content')
@include('templet.partials.navbar')
<div class="container mt-5">
    <h1 class="mb-4">Users List</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                      
                        @csrf
                        @method('PUT')
                        <select name="role" class="form-control">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>owner</option>

                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection