<?php
$css = 'assets/css/main.min.css';

if (is_readable($css)) {
    $css .= '?' . filemtime($css);
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="format-detection" content="telephone=no">

    <base href="{{get_site_url()}}" />

    <title>{{get_bloginfo()}}</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{$css}}" type="text/css" media="all">



    @if(!A365\Wordpress\Environment::isDevelop())
        @include('components.header.tracking')
    @endif


    {{-- Scripts --}}
    <script type="text/javascript" src="assets/js/vendor/modernizr.min.js?{!!filemtime('assets/js/vendor/modernizr.min.js')!!}"></script>

    <?php wp_head(); ?>

</head>