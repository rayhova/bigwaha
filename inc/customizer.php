<?php
/**
 * bigwaha Theme Customizer.
 *
 * @package bigwaha
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action( "customize_register", "theme_customize_register" );
function theme_customize_register( $wp_customize ) {

 //=============================================================
 // Remove header image and widgets option from theme customizer
 //=============================================================
 $wp_customize->remove_control("header_image");
 // $wp_customize->remove_panel("widgets");

 //=============================================================
 // Remove Colors, Background image, and Static front page 
 // option from theme customizer     
 //=============================================================
 $wp_customize->remove_section("colors");
 $wp_customize->remove_section("background_image");
 // $wp_customize->remove_section("static_front_page");

}

function bigwaha_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bigwaha_customize_register' );

function my_customizer_social_media_array() {
 
	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram','github','snapchat', 'email');
 
	return $social_sites;
}

function bigwaha_theme_customizer( $wp_customize ) {
	$wp_customize->add_panel('bigwaha_header_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Change the Header Settings from here as you want', 'bigwaha'),
      'priority' => 500,
      'title' => __('Header Options', 'bigwaha')
   ));
    $wp_customize->add_section( 'bigwaha_logo_section' , array(
	    'title'       => __( 'Logo Options', 'bigwaha' ),
	    'panel' => 'bigwaha_header_options',
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header, select utility bar',
	) );
	$wp_customize->add_setting( 'bigwaha_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bigwaha_logo', array(
		'label'    => __( 'Logo', 'bigwaha' ),
		'section'  => 'bigwaha_logo_section',
		'settings' => 'bigwaha_logo',
	) ) );
	 $wp_customize->add_section( 'bigwaha_int_header_section' , array(
	    'title'       => __( 'Interior Header Settings', 'bigwaha' ),
	    'panel' => 'bigwaha_header_options',
	    'priority'    => 30,
	) );

	
	 $wp_customize->add_setting( 'bigwaha_page_header', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bigwaha_page_header', array(
        'label'    => __( 'Default Interior Page Title Background', 'bigwaha' ),
        'section'  => 'bigwaha_int_header_section',
        'settings' => 'bigwaha_page_header',
        'description' => 'recommended size of 1900x300',
        
    ) ) );

    $wp_customize->add_panel('bigwaha_footer_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Change the Footer Settings from here as you want', 'bigwaha'),
      'priority' => 500,
      'title' => __('Footer Options', 'bigwaha')
   ));

	$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'text-domain'),
			'priority' => 35,
			'panel'    => 'bigwaha_footer_options'
	) );
 
	$social_sites = my_customizer_social_media_array();
	$priority = 5;
 
	foreach($social_sites as $social_site) {
 
		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'text-domain' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		) );
 
		$priority = $priority + 5;
	}
	}
add_action( 'customize_register', 'bigwaha_theme_customizer' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bigwaha_customize_preview_js() {
	wp_enqueue_script( 'bigwaha_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bigwaha_customize_preview_js' );

/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons() {
 
    $social_sites = my_customizer_social_media_array();
 
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }
 
    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {
 
            echo "<ul class='social-media-icons'>";
 
            foreach ( $active_sites as $active_site ) {
 
	            /* setup the class */
		        $class = 'fa fa-' . $active_site.'-square';
                if ( $active_site == 'instagram' ) {
                    $class = 'fa fa-' . $active_site;
                }
 
 
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot( is_email( get_theme_mod( $active_site ) ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
        }
}