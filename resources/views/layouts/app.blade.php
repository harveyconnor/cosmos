<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="layout layout-header-fixed layout-left-sidebar-fixed">
<div class="site-overlay"></div>
@include('partials.header')
<div class="site-main" id="app">
    @include('partials.sidebar')
    <div class="site-content">
        @yield('content')
    </div>
    <div class="site-footer">
        {{ date("Y") }} © {{ config('app.name') }}
    </div>
</div>
@include('partials.foot')
@yield('extra_scripts')
</body>
</html>