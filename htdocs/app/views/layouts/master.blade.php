<!DOCTYPE html>
<!--[if lt IE 9 ]>    <html class="outdated-browser" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js ie9up" <?php language_attributes(); ?>> <!--<![endif]-->
    @include('components.html.head')

    <body <?php body_class(); ?>>
        
        <div class="site js-site">
            @include('components.header')
            

            <main class="main js-main">
                @yield('content')
            </main>
             
            
            @include('components.footer')

        </div>

            @include('components.sidebar.sidebar')

        @include('components.html.foot')
    </body>
</html>