<form action="/<?php echo pll_current_language(); ?>" method="get" class="search-form">
    <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo __('Search', 'eas'); ?>" class="search-form__input" maxlength="100" />
    <button type="submit">
    	<i class="icon icon-search search-form__icon"></i>
    </button>

</form>
