@extends('layouts.admin')

@section('title', 'New Permission')
@section('breadcrumbs')
    {{ Breadcrumbs::render('permission-create') }}
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
    <div class="permission-create w-100">
        @includeIf('admin.permission._form', ['permission' => null])
    </div>
@endsection
