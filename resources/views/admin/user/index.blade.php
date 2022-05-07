@extends('layouts.admin')

@section('title', 'User')
@section('breadcrumbs')
    {{ Breadcrumbs::render('user') }}
@endsection
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="{{ route('app.admin.user.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Add user
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="user-table w-100">
        @includeIf('admin._partials._alert')
        @if(isset($users) && $users && count($users))
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                <tr>
                    <th class="w-1">No.</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Email Verified</th>
                    <th>Roles</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td><span class="text-muted">{{ $loop->index + 1 }}</span></td>
                    <td>{{ $user->name }}</td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->email_verified_at }}
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-info">{{ $role->display_name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <div data-bs-toggle="tooltip" data-bs-placement="left" title="Created at">
                            <i class="fa fa-clock me-1"></i>
                            {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                        </div>
                        <div data-bs-toggle="tooltip" data-bs-placement="left" title="Updated at">
                            <i class="fa fa-clock me-1"></i>
                            {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                    <i class="fa fa-cog me-1"></i> Actions
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('app.admin.user.show', ['user' => $user->uuid]) }}">
                                        <i class="fa fa-eye me-2"></i>Show
                                    </a>
                                    <a class="dropdown-item" href="{{ route('app.admin.user.edit', ['user' => $user->uuid]) }}">
                                        <i class="fa fa-pen me-2"></i>Edit
                                    </a>
                                    <a class="dropdown-item text-danger" href="javascript:void(0)" data-bs-toggle="modal" data-form="form-delete-role-{{ $user->id }}" data-bs-target="#modal-delete-row">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </a>
                                    <form id="form-delete-user-{{ $user->id }}" method="POST" action="{{ route('app.admin.user.destroy', ['user' => $user->uuid]) }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        @else
            @includeIf('admin._partials._empty', ['title' => 'User', 'link' => route('app.admin.user.create')])
        @endif
    </div>
@endsection
