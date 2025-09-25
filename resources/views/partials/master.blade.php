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
            @include('partials.footer')
            
          </div>
        </div>
        @include('partials.scripts')
    </body>
</html>