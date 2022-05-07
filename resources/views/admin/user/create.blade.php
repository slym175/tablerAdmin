@extends('layouts.admin')

@section('title', 'New User')
@section('breadcrumbs')
    {{ Breadcrumbs::render('user-create') }}
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
    <div class="user-create w-100">
        @includeIf('admin.user._form', ['user' => null, 'roles' => $roles, 'permissions' => $permissions])
    </div>
@endsection
