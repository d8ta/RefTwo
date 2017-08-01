<?php
$css = 'assets/css/main.min.css';

if (is_readable($css)) {
    $css .= '?' . filemtime($css);
}
?>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="format-detection" content="telephone=no">

    <base href="{{get_site_url()}}" />

    <title><?php wp_title(''); ?></title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{$css}}" type="text/css" media="all">



    @if(A365\Wordpress\Environment::isProduction())
        @include('components.header.tracking')
    @endif


    {{-- Scripts --}}
    <script type="text/javascript" src="assets/js/vendor/modernizr.min.js?{!!filemtime('assets/js/vendor/modernizr.min.js')!!}"></script>
    <script src="https://use.typekit.net/bzd4uum.js"></script>
    <script>try{Typekit.load({ async: false });}catch(e){}</script>
    <script type="text/javascript">
        var config = {};
        config.lang = '<?php echo pll_current_language(); ?>';
    </script>

    <?php wp_head(); ?>

</head>
