@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="#" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Thêm
            </a>
        </div>
    </div>
@endsection

@section('content')
    {{ __('Dashboard') }}
@endsection
