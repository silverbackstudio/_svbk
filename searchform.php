<?php
if ( 'page' === get_option( 'show_on_front' ) && ( is_home() || is_single() || is_archive() ) ) {
	$form_action = get_permalink( get_option( 'page_for_posts' ) );
} elseif ( is_post_type_archive() || ( is_singular() && get_post_type_archive_link( get_post_type() ) ) ) {
	$form_action = get_post_type_archive_link( get_post_type() );
} else {
	$form_action = get_home_url( '/' );
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( $form_action ); ?>">
	<label>
		<span class="screen-reader-text"><?php _x( 'Search for:', 'label', 'default' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'default' ); ?>" value="<?php get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit" ><?php echo esc_html_x( 'Search', 'submit button', 'default' ); ?></button>
</form>
