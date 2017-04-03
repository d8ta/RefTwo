<!DOCTYPE html>
<!--[if lt IE 9 ]>    <html class="show-incompatible_browser-alert" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    @include('components.html.head')

    <body <?php body_class(); ?>>
        
        <div class="site js-site">
            @include('components.header')
            

            <main class="main js-main">
                @yield('content')
            </main>
             
            
            @include('components.footer')

        </div>

       
        @include('components.html.foot')
    </body>
</html>