<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div class="col-md content-area mb-3">
				<div class="card">
					<?php echo get_the_post_thumbnail( get_the_id(), 'large', ['class' => 'card-img-top']); ?>

					<div class="card-footer">
						<ul class="nav nav-pills card-header-pills">
							<li class="nav-item">
								<a class="nav-link active" href="#">Active</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Link</a>
							</li>
							<li class="nav-item">
								<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<!--?php understrap_post_nav(); ?-->

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer();
