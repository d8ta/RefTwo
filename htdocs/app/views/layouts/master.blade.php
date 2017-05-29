<!DOCTYPE html>
<!--[if lt IE 9 ]>    <html class="outdated-browser" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js ie9up" <?php language_attributes(); ?>> <!--<![endif]-->
    @include('components.html.head')

    <body <?php body_class(); ?>>

        @include('components.header')

        <div class="site js-site">
            <main class="main js-main">
                @yield('content')
            </main>
            @include('components.footer')
            <div class="sidebar__page-overlay"></div>
        </div>
        
        @include('components.sidebar.sidebar')
        @include('components.alerts.alerts')
        @include('components.html.foot')
    </body>
</html>