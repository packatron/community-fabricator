<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-2 pr-md-0 widget-area" id="left-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-4 pr-md-0 widget-area" id="left-sidebar" role="complementary">
<?php endif; ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>

</div><!-- #left-sidebar -->
