<?php
/**
 * Template part for displaying a Testimonial
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _svbk
 */

global $more;

$_svbk_real_more = $more;
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
// phpcs:disable WordPress.WP.GlobalVariablesOverride.OverrideProhibited
$more = 1; // @i
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<?php the_content( null, false ); ?>
</div>
<?php
$more = $_svbk_real_more;
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
// phpcs:enable WordPress.WP.GlobalVariablesOverride.OverrideProhibited

