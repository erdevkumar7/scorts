<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body>
    @include('user.userNav')

    <!-- page content -->
    <div id="partial-escort">
        @yield('auth_content')
    </div>
    <!-- /page content -->

    @include('user.footer')
    @include('user.footerJS')
</body>

</html>