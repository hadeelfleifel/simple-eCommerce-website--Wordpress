<?php
//about theme info
add_action( 'admin_menu', 'ultimate_ecommerce_shop_gettingstarted' );
function ultimate_ecommerce_shop_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'ultimate-ecommerce-shop'), esc_html__('Get Started', 'ultimate-ecommerce-shop'), 'edit_theme_options', 'ultimate_ecommerce_shop_guide', 'ultimate_ecommerce_shop_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function ultimate_ecommerce_shop_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
   //wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/getting-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'ultimate_ecommerce_shop_admin_theme_style');

//guidline for about theme
function ultimate_ecommerce_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'ultimate-ecommerce-shop' );
?>

<div class="wrapper-info">
	<div class="top-section">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to Ultimate Ecommerce Theme', 'ultimate-ecommerce-shop' ); ?></h2>
	    	<span class="version">Version: <?php echo esc_html($theme['Version']);?></span>
	    	<p><?php esc_html_e('Ultimate Ecommerce Shop is a WordPress theme which, as the name suggests, is the ultimate option for all types of online stores. It is a multipurpose eCommerce WordPress theme which can be used for each and every type of store. Whether you have an online bookstore, mobile store, apparel store, sports shop, jewellery store, cosmetics store or a furniture store, this theme is for all. Not just for stores, it can also be used by service providing businesses such as tours and travels, restaurant, corporate business, freelancer, and health services. It is so flexible that you can use it for an eCommerce shop, blog, or a portfolio website. Its unique and beautiful design will make your site stand out no matter what business you are using it for. It is a customizable responsive WooCommerce WordPress theme which comes with a treasure of features and functionalities. It implements simple and clean coding which makes it SEO optimized. It is mobile-friendly, retina ready, and translation ready and supports multiple page layouts. It has all the features which you dream to have in your site. Just think of the type of business you want to do and this theme is there to help you serve in that business.','ultimate-ecommerce-shop'); ?></p>	    	
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/Logical-theme-responsive.png" alt="" />
			</div>
	    </div>
	    <div class="info-link">
			<a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'ultimate-ecommerce-shop' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'ultimate-ecommerce-shop'); ?></a>
			<a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'ultimate-ecommerce-shop'); ?></a>
			<a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'ultimate-ecommerce-shop'); ?></a>			
			<a class="get-pro" href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'ultimate-ecommerce-shop'); ?></a>
		</div>
	</div>

	<div class="accordain-sec">
		<div class="block">
		  	<input type="radio" name="city" id="cityA" checked />   
		  	<label for="cityA"><span><?php esc_html_e( 'Visit to our amazing Premium Theme', 'ultimate-ecommerce-shop' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info1">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'ultimate-ecommerce-shop' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="sec-left-inner">
			  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/Logical-theme-responsive.png" alt="" />
			  		<p class="lite-para"><?php esc_html_e('The premium Ecommerce WordPress theme is a multipurpose theme specially designed to suit all the eCommerce businesses. It has a blast of features and functionalities to carry out each and every function smoothly. It finds its use for all types of eCommerce businesses like clothing line, furniture shop, grocery shop, gadget shop, home decor shop, kids toy store, jewellery shop, sports shop and what not. Its user-friendly design provides an interactive interface. We can never compromise with the quality and hence we offer high-quality features and functionalities through plugins. Its unique design will make you stand apart from the abundance of eCommerce themes present on the internet.','ultimate-ecommerce-shop'); ?></p>

					<div class="info-link-top">
						<a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'ultimate-ecommerce-shop' ); ?></a>
						<a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'ultimate-ecommerce-shop' ); ?></a>
						<a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'ultimate-ecommerce-shop' ); ?></a>
					</div>
					
			  	</div>
		  	</div>
		</div>
		<div class="block">
		  	<input type="radio" name="city" id="cityB"/>
		  	<label for="cityB"><span><?php esc_html_e( 'Theme Features', 'ultimate-ecommerce-shop' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info2">
			    <h3><?php esc_html_e( 'Lite Theme v/s Premium Theme', 'ultimate-ecommerce-shop' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'ultimate-ecommerce-shop'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'ultimate-ecommerce-shop'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'ultimate-ecommerce-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'ultimate-ecommerce-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'ultimate-ecommerce-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'ultimate-ecommerce-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'ultimate-ecommerce-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'ultimate-ecommerce-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'ultimate-ecommerce-shop'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( ULTIMATE_ECOMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'ultimate-ecommerce-shop'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
		 	</div>
		</div>
	</div>
</div>
<?php } ?>