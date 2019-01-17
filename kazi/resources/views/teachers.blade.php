@extends('layouts.app')

@section('content')

@section('title', 'Teachers')

<div class="container">
    <div class="card">
        <div class="card-header">@yield('title')</div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Verified</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $user)
                    <tr>
                        <td>{{ $count-- }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @if(!empty($user->email_verified_at))
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-danger">No</span>
                        @endif
                        </td>
                        <td class="text-muted">{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-warning">Nothing found</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
