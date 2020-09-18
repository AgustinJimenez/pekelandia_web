<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<head lang="{{ LaravelLocalization::setLocale() }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="{{ Setting::get('core::site-description') }}" />
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title'){{ Setting::get('core::site-name') }}@show
    </title>

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
    {!! Theme::style('bootstrap/css/bootstrap.css') !!}
    {!! Theme::style('fonts/font-awesome/css/font-awesome.min.css') !!}
    {!! Theme::style('css/vendor/owl.carousel.css') !!}
    {!! Theme::style('css/vendor/owl.theme.css') !!}
    {!! Theme::style('css/vendor/owl.transitions.css') !!}
    {!! Theme::style('css/nicdark_style.css') !!}
    {!! Theme::style('css/styles.css') !!}
    {!! Theme::style('css/nicdark_responsive.css') !!}

    @yield('style')
</head>
<body id="start_nicdark_framework">

@include('partials.analyticstracking')

<div class="nicdark_site">

	<div class="nicdark_site_fullwidth nicdark_clearfix">

	   <div class="nicdark_overlay"></div>

@include('partials.navigation')

@yield('content')

@include('partials.footer')

    </div>

</div>

{!! Theme::script('js/main/jquery.min.js') !!}
{!! Theme::script('js/main/jquery-ui.js') !!}
{!! Theme::script('js/main/excanvas.js') !!}

{!! Theme::script('bootstrap/js/bootstrap.js') !!}

{!! Theme::script('plugins/menu/superfish.min.js') !!}
{!! Theme::script('plugins/menu/tinynav.min.js') !!}
{!! Theme::script('plugins/isotope/isotope.pkgd.min.js') !!}
{!! Theme::script('plugins/mpopup/jquery.magnific-popup.min.js') !!}
{!! Theme::script('plugins/scroolto/scroolto.js') !!}
{!! Theme::script('plugins/nicescrool/jquery.nicescroll.min.js') !!}
{!! Theme::script('plugins/inview/jquery.inview.min.js') !!}
{!! Theme::script('plugins/parallax/jquery.parallax-1.1.3.js') !!}
{!! Theme::script('plugins/countto/jquery.countTo.js') !!}
{!! Theme::script('plugins/countdown/jquery.countdown.js') !!}

{!! Theme::script('js/vendor/owl.carousel.js') !!}

{!! Theme::script('js/settings.js') !!}

<script type="text/javascript">
jQuery(document).ready(function() {

    $('#owl-banner').owlCarousel({
        items:1,
        loop:true,
        center:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:10000,
        autoplayHoverPause:true,
    });

});
</script>

@yield('scripts')

</body>

</html>
