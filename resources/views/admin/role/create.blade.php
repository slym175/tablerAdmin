@extends('layouts.admin')

@section('title', 'New Role')
@section('breadcrumbs')
    {{ Breadcrumbs::render('role-create') }}
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
        @includeIf('admin.role._form', ['role' => null, 'permissions' => $permissions])
    </div>
@endsection
