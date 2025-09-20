<!DOCTYPE html>
<html class="loading" lang="{{ Config::get('app.locale') }}"
    @if (Config::get('app.locale') == 'ar') data-textdirection="rtl" dir="RTL" @else data-textdirection="ltr" dir="LTR" @endif>

@include('layouts.dashboard._head')

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    @include('layouts.dashboard._header')

    @include('layouts.dashboard._sidebar')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                @section('breadcrumb')
                                    {{--  --}}
                                @show
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>


    @include('layouts.dashboard._footer')

    @include('layouts.dashboard._scripts')

</body>

</html>
