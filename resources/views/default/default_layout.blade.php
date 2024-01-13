<!DOCTYPE html>
<html lang="en">

<head>
    @include('default.components.header')
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SewaKostum</p>
        </div>
    </div>
    @include('default.components.navbar')

    @yield('content')

    @include('default.components.footer')

</body>

</html>
