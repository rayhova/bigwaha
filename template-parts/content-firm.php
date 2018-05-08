<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bigwaha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="col-md-7 col-xs-12">
		<?php the_content(); ?>
	</div>
	<div class="col-md-5 col-xs-12">
		<?php if ( has_post_thumbnail() ) : ?>
		    <?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
	<footer class="entry-footer">
		<?php bigwaha_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
