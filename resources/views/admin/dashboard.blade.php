@extends('layouts.admin')

@section('title', 'Dashboard')
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="#" class="btn btn-primary">
                Actions
            </a>
        </div>
    </div>
@endsection

@section('content')
    {{ __('Dashboard') }}
@endsection
