<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bigwaha
 */

get_header(); ?>
<div class="col-md-8 col-lg-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bigwaha' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<h2>Turnover on Downs!</h2>
					<p>It looks like you came to this page by error</p>
					<div class="col-lg-12"><img src="/wp-content/themes/bigwaha/img/buttfumble.jpg" class="img-responsive">
					</div>
					<div class="text-404">
						<p>Why don't you take a shot and try searching for what you were looking for</p>
						<?php
						get_search_form();

						
					?>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_sidebar(); ?>
</div> <!-- .content -->
<?php
get_footer();
