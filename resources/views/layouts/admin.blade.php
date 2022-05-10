<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- CSS files -->
    <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/libs/tom-select/dist/css/tom-select.bootstrap5.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body class=" border-top-wide border-primary d-flex flex-column" ng-app="ngTablerApp">
<div class="wrapper">
    @if(!isset($isAuthView) || !$isAuthView)
        @includeIf('admin._partials._sidebar')
        @includeIf('admin._partials._header')
    @endif
    <div class="page-wrapper @if(isset($isAuthView) && $isAuthView) page page-center @endif">
        @if(!isset($isAuthView) || !$isAuthView)
            <div class="container-fluid">
                <!-- Page title -->
                <div class="page-header">
                    <div class="row align-items-center mw-100">
                        <div class="col">
                            <div class="mb-1">
                                @yield('breadcrumbs')
                            </div>
                            <h2 class="page-title">
                                <span class="text-truncate">@yield('title')</span>
                            </h2>
                        </div>
                        @yield('actions')
                    </div>
                </div>
            </div>
        @endif
        <div class="page-body">
            <div class="container-fluid">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @if(!isset($isAuthView) || !$isAuthView)
                @includeIf('admin._partials._footer')
        @endif
    </div>
</div>

<script type="text/javascript" src="{{ asset('tabler/libs/jquery/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('tabler/libs/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('tabler/js/tabler.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('tabler/libs/angular-1.8.2/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('tabler/libs/angular-1.8.2/angular-sanitize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript">
    let ngTablerApp = angular.module('ngTablerApp', [], ($interpolateProvider) => {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).constant('ngAppConfig', {
        pathAssets: location.origin,
    });
</script>
<script type="text/javascript" src="{{ asset('tabler/angularjs/ngTablerGlobalServices.js') }}"></script>
@stack('js')
</body>
</html>
