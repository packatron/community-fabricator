<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $wp_query;

use Packatron\CommunityFabricator\Helpers\Http;
use Packatron\CommunityFabricator\Providers\Entities;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$query = get_search_query();
$filterPostType = $wp_query->get('post_type')

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf(
							esc_html__( 'Search Results for: %s', 'understrap' ),
							'<span>' . get_search_query() . '</span>'
						);
						?>
					</h1>
				</header><!-- .page-header -->

				<ul class="nav nav-tabs mb-2">
					<li class="nav-item">
						<a class="nav-link <?=$filterPostType == 'any' ? 'active' : ''?>"
						   href="<?=add_query_arg('post_type', 'any', Http::getCurrentUrl()); ?>">
							<?php echo esc_html__( 'All', 'understrap' ); ?>
						</a>
					</li>
					<?php foreach (Entities::getAll() as $entity) { ?>
						<li class="nav-item">
							<a class="nav-link <?=$filterPostType == $entity->post_name ? 'active' : ''?>"
							   href="<?=add_query_arg('post_type', $entity->post_name, Http::getCurrentUrl()); ?>">
								<?php echo esc_html__($entity->post_title, 'understrap'); ?>
							</a>
						</li>
					<?php } ?>
				</ul>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'search' ); ?>
					<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php get_footer();
