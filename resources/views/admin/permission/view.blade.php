@extends('layouts.admin')

@section('title', 'View Permission')
@section('breadcrumbs')
    {{ Breadcrumbs::render('permission-view', $permission) }}
@endsection
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="{{ route('app.admin.permission.index') }}" class="btn btn-default">
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
                            <p class="d-block text-muted text-truncate mt-n1">{{ $permission->display_name }}</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Name</strong>
                            <p class="d-block text-muted text-truncate mt-n1">{{ $permission->name }}</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Guard Name</strong>
                            <p class="d-block text-muted text-truncate mt-n1">{{ \Illuminate\Support\Str::ucfirst($permission->guard_name) }}</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <strong class="text-body d-block">Date</strong>
                            <div class="d-block text-muted text-truncate mt-n1">
                                <div>Created at: {{ $permission->created_at }}</div>
                                <div>Updated at: {{ $permission->updated_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('app.admin.permission.edit', ['permission' => $permission->name]) }}" class="btn btn-primary ms-2">Update data</a>
                </div>
            </div>
        </div>
    </div>
@endsection
