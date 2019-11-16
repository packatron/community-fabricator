<?php
/**
 * Hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-hero">

	<div class="jumbotron jumbotron-fluid">
		<div class="<?php echo esc_attr( $container ); ?>">
			<h1 class="display-4">Fluid jumbotron</h1>
			<p>This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
			<p><a href="#" class="btn btn-primary btn-large">Learn more »</a></p>
		</div>
	</div>

</div>

