<?php
/**
 * Ultimate Ecommerce Shop Theme Customizer
 *
 * @package Ultimate Ecommerce Shop
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ultimate_ecommerce_shop_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'ultimate_ecommerce_shop_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'ultimate-ecommerce-shop' ),
	    'description' => __( 'Description of what this panel does.', 'ultimate-ecommerce-shop' ),
	) );

	$wp_customize->add_section( 'ultimate_ecommerce_shop_left_right' , array(
    	'title'      => __( 'General Settings', 'ultimate-ecommerce-shop' ),
		'priority'   => 30,
		'panel' => 'ultimate_ecommerce_shop_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('ultimate_ecommerce_shop_theme_options',array(
        'default' => __( 'Right Sidebar', 'ultimate-ecommerce-shop' ),
        'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'	        
	));

	$wp_customize->add_control('ultimate_ecommerce_shop_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'ultimate-ecommerce-shop' ),
	        'section' => 'ultimate_ecommerce_shop_left_right',
	        'choices' => array(
	            'One Column' => __('One Column ','ultimate-ecommerce-shop'),
	            'Three Columns' => __('Three Columns','ultimate-ecommerce-shop'),
	            'Four Columns' => __('Four Columns','ultimate-ecommerce-shop'),
	            'Right Sidebar' => __('Right Sidebar','ultimate-ecommerce-shop'),
	            'Left Sidebar' => __('Left Sidebar','ultimate-ecommerce-shop'),
	            'Grid Layout' => __('Grid Layout','ultimate-ecommerce-shop')
	        ),
	));

	$font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'ultimate_ecommerce_shop_typography', array(
    	'title'      => __( 'Typography', 'ultimate-ecommerce-shop' ),
		'priority'   => 30,
		'panel' => 'ultimate_ecommerce_shop_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_paragraph_color', array(
		'label' => __('Paragraph Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_paragraph_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'Paragraph Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('ultimate_ecommerce_shop_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_atag_color', array(
		'label' => __('"a" Tag Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_atag_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( '"a" Tag Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_li_color', array(
		'label' => __('"li" Tag Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_li_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( '"li" Tag Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_h1_color', array(
		'label' => __('H1 Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_h1_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'H1 Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_h1_font_size',array(
		'label'	=> __('H1 Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_h2_color', array(
		'label' => __('h2 Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_h2_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'h2 Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_h2_font_size',array(
		'label'	=> __('h2 Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_h3_color', array(
		'label' => __('h3 Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_h3_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'h3 Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_h3_font_size',array(
		'label'	=> __('h3 Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_h4_color', array(
		'label' => __('h4 Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_h4_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'h4 Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_h4_font_size',array(
		'label'	=> __('h4 Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_h5_color', array(
		'label' => __('h5 Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_h5_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'h5 Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_h5_font_size',array(
		'label'	=> __('h5 Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'ultimate_ecommerce_shop_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultimate_ecommerce_shop_h6_color', array(
		'label' => __('h6 Color', 'ultimate-ecommerce-shop'),
		'section' => 'ultimate_ecommerce_shop_typography',
		'settings' => 'ultimate_ecommerce_shop_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ultimate_ecommerce_shop_h6_font_family', array(
	    'section'  => 'ultimate_ecommerce_shop_typography',
	    'label'    => __( 'h6 Fonts','ultimate-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('ultimate_ecommerce_shop_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_h6_font_size',array(
		'label'	=> __('h6 Font Size','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_typography',
		'setting'	=> 'ultimate_ecommerce_shop_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('ultimate_ecommerce_shop_topbar',array(
		'title'	=> __('Topbar','ultimate-ecommerce-shop'),
		'description'	=> __('Add Topbar Content here','ultimate-ecommerce-shop'),
		'priority'	=> null,
		'panel' => 'ultimate_ecommerce_shop_panel_id',
	));

	$wp_customize->add_setting('ultimate_ecommerce_shop_discount_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ultimate_ecommerce_shop_discount_text',array(
		'label'	=> __('Add Discount Text','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_topbar',
		'setting'	=> 'ultimate_ecommerce_shop_discount_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ultimate_ecommerce_shop_call_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ultimate_ecommerce_shop_call_text',array(
		'label'	=> __('Add Call Text','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_topbar',
		'setting'	=> 'ultimate_ecommerce_shop_call_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ultimate_ecommerce_shop_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ultimate_ecommerce_shop_call',array(
		'label'	=> __('Add Phone Number','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_topbar',
		'setting'	=> 'ultimate_ecommerce_shop_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ultimate_ecommerce_shop_mail_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ultimate_ecommerce_shop_mail_text',array(
		'label'	=> __('Add Email Text','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_topbar',
		'setting'	=> 'ultimate_ecommerce_shop_mail_text',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('ultimate_ecommerce_shop_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ultimate_ecommerce_shop_mail',array(
		'label'	=> __('Add Email','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_topbar',
		'setting'	=> 'ultimate_ecommerce_shop_mail',
		'type'		=> 'text'
	));	
	
	//home page slider
	$wp_customize->add_section( 'ultimate_ecommerce_shop_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'ultimate-ecommerce-shop' ),
		'priority'   => null,
		'panel' => 'ultimate_ecommerce_shop_panel_id'
	) );

	$wp_customize->add_setting('ultimate_ecommerce_shop_slider_hide',array(
	   'default' => 'false',
	   'sanitize_callback'  => 'sanitize_text_field'
	));
	$wp_customize->add_control('ultimate_ecommerce_shop_slider_hide',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','ultimate-ecommerce-shop'),
	   'section' => 'ultimate_ecommerce_shop_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'ultimate_ecommerce_shop_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'ultimate_ecommerce_shop_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'ultimate-ecommerce-shop' ),
			'section'  => 'ultimate_ecommerce_shop_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Top Products
	$wp_customize->add_section('ultimate_ecommerce_shop_top_product_sec',array(
		'title'	=> __('Top Products Section ','ultimate-ecommerce-shop'),
		'description'=> __('This section will appear below the slider.','ultimate-ecommerce-shop'),
		'panel' => 'ultimate_ecommerce_shop_panel_id',
	));

	$wp_customize->add_setting( 'ultimate_ecommerce_shop_product_title', array(
		'default'           => '',
		'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'ultimate_ecommerce_shop_product_title', array(
		'label'    => __( 'Select Top Product Title Page', 'ultimate-ecommerce-shop' ),
		'section'  => 'ultimate_ecommerce_shop_top_product_sec',
		'type'     => 'dropdown-pages'
	));

	$wp_customize->add_setting( 'ultimate_ecommerce_shop_top_products', array(
		'default'           => '',
		'sanitize_callback' => 'ultimate_ecommerce_shop_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'ultimate_ecommerce_shop_top_products', array(
		'label'    => __( 'Select Page', 'ultimate-ecommerce-shop' ),
		'section'  => 'ultimate_ecommerce_shop_top_product_sec',
		'type'     => 'dropdown-pages'
	));
		
	//footer
	$wp_customize->add_section('ultimate_ecommerce_shop_footer_section',array(
		'title'	=> __('Footer Text','ultimate-ecommerce-shop'),
		'description'	=> __('Add some text for footer like copyright etc.','ultimate-ecommerce-shop'),
		'panel' => 'ultimate_ecommerce_shop_panel_id'
	));
	
	$wp_customize->add_setting('ultimate_ecommerce_shop_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ultimate_ecommerce_shop_footer_copy',array(
		'label'	=> __('Copyright Text','ultimate-ecommerce-shop'),
		'section'	=> 'ultimate_ecommerce_shop_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'ultimate_ecommerce_shop_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ultimate_Ecommerce_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ultimate_Ecommerce_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
		 	new Ultimate_Ecommerce_Shop_Customize_Section_Pro(
		 		$manager,
		 		'example_1',
		 		array(
					'priority' => 9,
	 				'title'    => esc_html__( 'Ultimate Ecommerce Pro', 'ultimate-ecommerce-shop' ),
					'pro_text' => esc_html__( 'Go Pro',         'ultimate-ecommerce-shop' ),
					'pro_url'  => esc_url('https://www.logicalthemes.com/themes/premium-ecommerce-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ultimate-ecommerce-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ultimate-ecommerce-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ultimate_Ecommerce_Shop_Customize::get_instance();