<!DOCTYPE html>
<html>

<head>
    @include('landing.layouts.head')
</head>

<body @yield('sub_page')>

    @yield('content')


    <!-- end map section -->

    @include('landing.layouts.footer')

    @include('landing.layouts.script')

</body>

</html>
