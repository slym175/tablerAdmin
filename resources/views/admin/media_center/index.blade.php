@extends('layouts.admin')

@section('title', 'Media Center')
@section('breadcrumbs')
    {{ Breadcrumbs::render('media-center') }}
@endsection
@section('actions')

@endsection

@section('content')
    <div class="media-center-container w-100" ng-controller="ngMediaCenterController">
        <ng-media-center></ng-media-center>
    </div>
@endsection
@push('js')
    <script src="{{ asset('tabler/angularjs/services/ngMediaCenterService.js') }}"></script>
    <script src="{{ asset('tabler/angularjs/controllers/ngMediaCenterController.js') }}"></script>
    <script src="{{ asset('tabler/angularjs/directives/ngMediaCenterDirective.js') }}"></script>
@endpush
