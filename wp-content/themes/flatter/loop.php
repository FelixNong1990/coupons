<?php
/**
 * The loop that displays the blog posts.
 *
 * @package AppThemes
 * @subpackage Clipper
 *
 */


// hack needed for "<!-- more -->" to work with templates
// call before the loop
global $more;
$more = 0;
?>

<?php appthemes_before_blog_loop(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if ( is_single() ) appthemes_stats_update( $post->ID ); //records the page hit on single blog page view ?>

		<?php appthemes_before_blog_post(); ?>

		<div <?php post_class('content-box'); ?> id="post-<?php the_ID(); ?>">

			<div class="box-c">

				<div class="box-holder">

					<div class="blog">
						<div class="left-blog-content">
							<?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
						</div>
						
						<div class="right-blog-content">
							
						</div>
					</div>

				</div>

			</div>

		</div>

		<?php appthemes_after_blog_post(); ?>


	<?php endwhile; ?>

	<?php appthemes_after_blog_endwhile(); ?>


<?php else: ?>


	<?php appthemes_blog_loop_else(); ?>

	<div class="content-box">

		<div class="box-c">

			<div class="box-holder">

				<div class="blog">

					<h4><?php _e( 'No Posts Found', APP_TD ); ?></h4>

					<div class="text-box">

						<?php _e( 'Sorry, no posts found.', APP_TD ); ?>

					</div>

				</div>

			</div>

		</div>

	</div>


<?php endif; ?>

<?php appthemes_after_blog_loop(); ?>
