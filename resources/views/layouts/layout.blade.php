@include('layouts.__partials.header')

@include('layouts.__partials.navbar')

@yield('banner')

@yield('content')

@include('layouts.__partials.footer')

</div>

<!--WRAPPER END-->

<!--jQuery START-->

<!--JQUERY MIN JS-->

<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>

<!--BOOTSTRAP JS-->

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!--OWL CAROUSEL JS-->

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!--BANNER ZOOM OUT IN-->

<script src="{{ asset('assets/js/jquery.velocity.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.kenburnsy.js') }}"></script>

<!--SCROLL FOR SIDEBAR NAVIGATION-->

<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!--CUSTOM JS-->

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/parsley.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/select2/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/select2/select2-bootstrap.min.css') }}" />
<script src="{{ asset('assets/select2/select2.min.js') }}"></script>
@stack('custom-js')
<script>
    $( ".select2" ).select2({
        theme: "bootstrap"
    });
</script>

</body>

</html>
