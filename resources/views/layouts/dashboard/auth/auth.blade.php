<!DOCTYPE html>
<html class="loading" lang="{{ Config::get('app.locale') }}" @if (Config::get('app.locale') == 'ar') data-textdirection="rtl" dir="RTL" @else data-textdirection="ltr" dir="LTR" @endif>

@include('layouts.dashboard.auth._head')

<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

    @include('layouts.dashboard.auth._header')


    @yield('content')


    @include('layouts.dashboard.auth._footer')

    @include('layouts.dashboard.auth._scripts')

</body>

</html>
