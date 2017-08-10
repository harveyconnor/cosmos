<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="authentication-body">
<div class="container-fluid" id="app">
    @yield('content')
    <div class="authentication-footer">
        <span class="text-muted">Need help? Contact us mail@example.com</span>
    </div>
</div>
@include('partials.foot')
@yield('extra_scripts')
</body>
</html>