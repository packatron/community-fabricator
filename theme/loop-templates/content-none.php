<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found mt-5">

	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'community-fabricator' ); ?></h2>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php
				printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'community-fabricator' ), array(
				'a' => array(
				'href' => array(),
				),
				) ), esc_url( admin_url( 'post-new.php' ) ) );
				?>
			</p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'community-fabricator' ); ?></p>
			<p><?php esc_html_e( 'Looking for people or posts? Try entering a name, location, or different words.', 'community-fabricator' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'community-fabricator' ); ?></p>
		<?php endif; ?>
	</div>

</section>
