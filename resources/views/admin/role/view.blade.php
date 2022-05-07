@extends('layouts.admin')

@section('title', 'View Role')
@section('breadcrumbs')
    {{ Breadcrumbs::render('role-view', $role) }}
@endsection
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="{{ route('app.admin.role.index') }}" class="btn btn-default">
                <i class="fa fa-arrow-left me-2"></i>Back
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="user-view w-100">
        <div class="card mb-3">
            <div class="list-group list-group-flush list-group-hoverable">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Display Name</strong>
                            <p class="d-block text-muted text-truncate mt-n1">{{ $role->display_name }}</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Name</strong>
                            <p class="d-block text-muted text-truncate mt-n1">{{ $role->name }}</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Permissions</strong>
                            <p class="d-block text-muted text-truncate mt-n1">
                                @foreach($role->permissions as $permission)
                                    <span class="badge bg-info">{{ $permission->display_name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Guard Name</strong>
                            <p class="d-block text-muted text-truncate mt-n1">{{ \Illuminate\Support\Str::ucfirst($role->guard_name) }}</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Date</strong>
                            <div class="d-block text-muted text-truncate mt-n1">
                                <div>Created at: {{ $role->created_at }}</div>
                                <div>Updated at: {{ $role->updated_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('app.admin.role.edit', ['role' => $role->name]) }}" class="btn btn-primary ms-2">Update data</a>
                </div>
            </div>
        </div>
    </div>
@endsection
