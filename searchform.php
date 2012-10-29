<?php
/**
 * The template for displaying search forms in Copious
 *
 * @package Copious
 * @since Copious 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'copious' ); ?></label>
		<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'copious' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'copious' ); ?>" />
	</form>
