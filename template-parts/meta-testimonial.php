<?php
/**
 * Template part for displaying a Testimonial
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _svbk
 */

$rating          = get_post_meta( get_the_ID(), 'rating', true );
$avatar_id       = get_post_meta( get_the_ID(), 'avatarId', true );
$avatar_name     = get_post_meta( get_the_ID(), 'avatarName', true );
$author_role     = get_post_meta( get_the_ID(), 'authorRole', true );
$publish_date    = get_post_meta( get_the_ID(), 'publishDate', true );
$source          = get_post_meta( get_the_ID(), 'testimonialSource', true );
$company_logo_id = get_post_meta( get_the_ID(), 'companyLogoId', true );

?>
<div class="wp-block-svbk-testimonial__header" >
	<?php if ( $avatar_id ) : ?>
	<figure class="wp-block-svbk-testimonial__avatar" >
		<?php echo wp_get_attachment_image( $avatar_id, 'small' ); ?>
	</figure> 
	<?php endif; ?>

	<?php if ( $avatar_name ) : ?>
	<div class="wp-block-svbk-testimonial__author">
		<div class="wp-block-svbk-testimonial__author-name" ><?php echo esc_html( $avatar_name ); ?></div>
		<?php if ( $author_role ) : ?>
			<div class="wp-block-svbk-testimonial__author-role" ><?php echo esc_html( $author_role ); ?></div>
		<?php endif ?>
	</div>					
	<?php endif; ?>

	<?php if ( $rating ) : ?> 
	<div class="wp-block-svbk-testimonial__rating rating <?php echo $rating ? ( 'rating--' . $rating ) : ''; ?>" >
		<span class="rating__label"><?php _e( 'Rating', '_svbk' ); ?>:</span>
		<span class="rating__value"><?php echo esc_html( $rating ); ?></span>
	</div>
	<?php endif; ?>

	<?php if ( $publish_date || $source ) : ?> 
	<div class="wp-block-svbk-testimonial__meta" >
		<?php
		if ( $publish_date ) :
			?>
			<span class="wp-block-svbk-testimonial__date" ><?php echo esc_html( $publish_date ); ?></span><?php endif; ?>
		<?php
		if ( $source ) :
			?>
			<span class="wp-block-svbk-testimonial__source" ><?php echo esc_html( $source ); ?></span><?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if ( $company_logo_id ) : ?>
	<figure class="wp-block-svbk-testimonial__company-logo" >
		<?php echo wp_get_attachment_image( $company_logo_id, 'small' ); ?>
	</figure> 
	<?php endif; ?>
</div>



