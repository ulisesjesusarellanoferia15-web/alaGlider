<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')

</head>
@include('auth.login-modal')
@include('auth.register-modal')
@include('auth.verification-modal')

<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            @include('partials.navbar')
            @include('partials.menu')
            @yield('content')
        </div>
    </div>
    @include('partials.scripts')
    <div class="footer-wrapper" style="margin-top: 120px;">
        @include('partials.footer')
    </div>
</body>




</html>
