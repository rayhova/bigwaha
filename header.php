<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bigwaha
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bigwaha' ); ?></a>
	<header id="masthead" class="site-header" role="banner"><div class="container container-fluid">
		<div class="col-md-4 col-sm-6 col-xs-6">
		<div class="site-branding">
			<?php if ( get_theme_mod( 'bigwaha_logo' ) ) : ?>
    <div class='site-logo'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'bigwaha_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
</div>
<div class="col-md-8">
		<nav id="site-navigation" class="main-navigation" role="navigation">
				
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<div id="menu-toggle" class="closed" aria-controls="mobile-menu" aria-expanded="false"><i class="fa fa-bars fa-2x"></i></div>
		<nav id="mobile-nav" class="mobile-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_id' => 'mobile-menu' ) ); ?>
		</nav>
		</div>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<?php if (!is_front_page()   ) {
	 $obj = get_post_type_object(get_post_type());  ?>
		<div class="page-head-bg">
			<header class="entry-header">
	        
			</header><!-- .entry-header --> 
		</div>
			<?php }



?>
	
	<?php if ( is_page_template( 'home-page.php' ) || is_page_template( 'full-width-page.php' )  ) { ?>
	<div class="container full-width"> 
<?php } else { ?>
	<div class="container container-fluid content-container">
	<div id="content" class="site-content">
	 
 <?php } ?>