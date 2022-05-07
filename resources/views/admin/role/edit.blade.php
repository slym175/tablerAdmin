@extends('layouts.admin')

@section('title', 'Edit Role')
@section('breadcrumbs')
    {{ Breadcrumbs::render('role-edit', $role) }}
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
    <div class="role-create w-100">
        @includeIf('admin.role._form', ['role' => $role, 'permissions' => $permissions])
    </div>
@endsection
