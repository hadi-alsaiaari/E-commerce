<!DOCTYPE html>
<html class="loading" lang="{{ Config::get('app.locale') }}" @if (Config::get('app.locale') == 'ar') data-textdirection="rtl" dir="RTL" @else data-textdirection="ltr" dir="LTR" @endif>

@include('layouts.dashboard._head')

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('layouts.dashboard._header')

    @include('layouts.dashboard._sidebar')


    @yield('content')


    @include('layouts.dashboard._footer')

    @include('layouts.dashboard._scripts')
    
</body>

</html>
