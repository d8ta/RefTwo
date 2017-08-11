<?php
/**
 * @var \A365\Wordpress\Models\Page $page
 */
?>
<header class="section site-header">
    <div class="section__content">
        <div class="site-header__inner">
	        <div class="site-header__left">
	            @include('components.header.logo-box')
	        </div>
	        <div class="site-header__right">
	        	<div class="site-header__lang-switch">
	        		@include('components.header.language-switch')
	        	</div>
	        	@include('components.header.navigation')
	        </div>
			@include('components.header.menu-burger')
	    </div>
    </div>
</header>

