<?php
/**
 * The Firm Template
 *
Template Name:  The Firm	
 *
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RGDeuce
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'firm' );

				
			endwhile; // End of the loop.
			?>
						
			<div class="firm-members">
			<h3>Meet Our Team</h3>
				<?php if( have_rows('firm_members') ): ?>

					<div class="members">

						<?php while( have_rows('firm_members') ): the_row(); ?>
							<div class="col-md-3 col-sm-4 col-xs-6">

							<?php 
							// vars
								$post_object = get_sub_field('member');
								

								if( $post_object ): 

								// override $post
									$post = $post_object;
									setup_postdata( $post ); 

									?>
								    <div class="member">
								    	<?php the_post_thumbnail(); ?>
								    	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								    	<h5><?php the_field('job_title'); ?></h5>
								    </div>
								    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>

					</div> <!-- .members -->

				<?php endif; ?>
			</div><!-- .firm-members -->

		</main><!-- #main -->
	</div><!-- #primary -->
	

</div> <!-- .content -->


<?php get_footer(); ?>
