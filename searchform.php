<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<label class="show-for-sr" for="search">Search in <?php echo home_url( '/' ); ?></label>
	<input class="search-input" type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
</form>
