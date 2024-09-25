<?php
/**
 *
 * Single.php template for learning technology posts.
 * References edtech_tags in place of the standard categories on the default template.
 *
 * @package pitchfork
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

	<article id="skip-to-content post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php while ( have_posts() ) {

		the_post();

		if ( has_post_format('aside') ) {
			// Load a post-template.
			do_action('qm/debug', 'We will load a template.');
			get_template_part( 'format', 'aside' );
		} else {
			// "Standard" post formatting follows.
			?>

			<header class="entry-header">
				<div class="title-wrap">
				<?php the_title( '<h1 class="entry-title article">', '</h1>' ); ?>
				</div>

				<?php echo get_the_post_thumbnail($post_id, 'full', array( 'class' => 'img-fluid' )); ?>

			</header>

			<div class="content-wrap">

				<?php
				/**
				 * Test if post has an excerpt that's been deliberatly created.
				 * If not, avoid putting it on the page here because of duplicate content.
				 * (Default excerpt repeats the first 140 characters of the post.)
				*/

				if ( has_excerpt() ) {
					echo '<section class="excerpt">';
					the_excerpt();
					echo '</section>';
				}
				?>

				<aside class="secondary">
					<div class="sidebar-wrap">

						<div class="post-meta">

							<div class="attribution">

								<?php echo get_avatar( get_the_author_meta( 'ID' ), 80, 'mystery' ); ?>
								<div class="entry-byline">
									<p>
										<?php esc_html_e( 'By ', 'pitchfork' );
										pitchfork_posted_by(); ?>
									</p>
									<p>
										<?php pitchfork_posted_originally(); ?>
									</p>
								</div>

							</div>

							<?php
							// Edtech_tags list as button-tags from the UDS card spec.
							$categories = get_the_terms( $post->ID ,'edtech-tag');
							$categorylist = '';
							if ( ! empty( $categories ) ) {
								$categorylist = '<ul class="category-list">';
								foreach( $categories as $category ) {
									$categorylist .= '<li><a class="btn btn-tag btn-tag-alt-white" href="' . esc_url( get_term_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
								}
								$categorylist .= '</ul>';
							}
							echo $categorylist;
							?>

							<?php
							/**
							 * Social share intent icons.
							 * @since v2.1 - Provides preferred support for AddToAny in this sidebar location.
							 * AddToAny mirrors service used by ASU News.
							 */

							if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
								ADDTOANY_SHARE_SAVE_KIT();
							}
							?>

						</div>
					</div>
				</aside>

				<section class="content">
					<?php the_content(); ?>
				</section>

			<footer class="entry-footer default-max-width">

				<?php
				// The default single tempalte output the tag list in this space under post content.
				?>

			</footer>

		<?php  // Comments template would go here.

		} // end post_format = standard check.

	} // end while_have_posts

	echo '</article>';

get_footer();
