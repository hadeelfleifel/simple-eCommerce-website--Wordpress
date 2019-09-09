<?php 
/*
* Display Theme menus
*/
?>

<div class="header">
  	<div class="container-fluid">
      <div class="row m-0">
    		<div class="col-lg-2 col-md-3 cat_menu">
          	<button type="button" class="drp_dwn_ecommerce dropdown-toggle" data-toggle="dropdown">
          	<i class="fa fa-bars" aria-hidden="true"></i> <?php esc_html_e('CATEGORIES','ultimate-ecommerce-shop'); ?> <span class="caret"></span></button>
          	<?php if(function_exists('get_woocommerce_term_meta')){ ?>
          	<ul class="dropdown-menu cat_box" role="menu">
            	<?php 
              	$get_parent_cats = array(
                	'orderby'    => 'title',
                	'order'      => 'ASC',
                	'hide_empty' => 0,
                	'parent'  => 0
              	); 
              	$all_categories = get_terms( 'product_cat', $get_parent_cats) ;//get parent categories 
              	$count1 = count($all_categories);
              	if ( $count1 > 0 ){
                	foreach( $all_categories as $single_category ){
                    	//for each category, get the ID
                    	$thumbnail_id1 = get_woocommerce_term_meta( $single_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
                    	$image1 = wp_get_attachment_url( $thumbnail_id1 );
                    	//$catID1 = $single_category->term_ID;
                    	$category_id_1 = get_cat_ID($single_category->term_id); 
                    	$category_link_1 = get_category_link( $single_category->term_id ); 
                  ?>
                  	<li class="dropdown-submenu"><a tabindex="-1" href="<?php echo esc_url(  get_term_link( $single_category->term_id ) ); ?> ">
                    <?php
                    if ( $image1 ) {
                      echo '<img class="thumd_img" src="' . esc_url( $image1 ) . '" alt="" />';
                    }?>
                    <span class="cat_name"><?php echo esc_html( $single_category->name ); ?></span></a>
                    <?php
                     	$get_children_cats = array(
                          'parent'   => $single_category->term_id,
                          'orderby'    => 'title',
                          'order'      => 'ASC',
                          'hide_empty' => 0,
                          //'taxonomy' =>  //get children of this parent using the catID variable from earlier
                      	);
                      	$child_cats = get_terms( 'product_cat' ,$get_children_cats );
                      	$count2 = count($child_cats);
                      	if ( $count2 > 0 ){
                        	echo ' <ul class="dropdown-menu">';
                        	foreach( $child_cats as $child_cat ){
                            	//for each child category, get the ID
                            	$childID = $child_cat->cat_ID;
                            	$thumbnail_id2 = get_woocommerce_term_meta( $child_cat->term_id, 'thumbnail_id', true );
                            	$image2 = wp_get_attachment_url( $thumbnail_id2 );
                          	?>
                          	<li class="dropdown-submenu"><a href=" <?php echo esc_url(  get_term_link( $child_cat->term_id ) ); ?> ">
                            	<?php
                              	if ( $image2 ) {
                              	echo '<img class="thumd_img" src="' . esc_url( $image2 ) . '" alt="" />';
                            }
                           echo esc_html($child_cat->name ); ?></a>
                            <?php
                              	$get_children_cats_child = array(
                                	'parent'  => $child_cat->term_id,
                                	'orderby'    => 'title',
                                	'order'      => 'ASC',
                                	'hide_empty' => 0,
                                	//'taxonomy' =>  //get children of this parent using the catID variable from earlier
                              	);
                              	$child_cats_child = get_terms( 'product_cat' ,$get_children_cats_child );
                              	$count2 = count($child_cats_child);
                              	if ( $count2 > 0 ){
                                	echo '<ul class="dropdown-menu">';
                               	 	foreach( $child_cats_child as $child_cat_child ){
  	                                $thumbnail_id = get_woocommerce_term_meta( $child_cat_child->term_id, 'thumbnail_id', true ); 
  	                                $image = wp_get_attachment_url( $thumbnail_id );
  	                                $childID_child = $child_cat_child->cat_ID;
  	                                ?>
                                  	<li class="dropdown-submenu"><a href=" <?php echo esc_url(  get_term_link( $child_cat_child->term_id ) ); ?> ">
                                  	<?php
                                  	if ( $image ) {
                                    	echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="" />';
                                  	}
                                  	?>
                                  		<?php echo esc_html( $child_cat_child->name );
                                  		echo '</a></li>';
                                	}
                              		echo '</ul></li>';
                            	}
                          	}
                         	 	echo '</ul></li>';
                      		}
                    	} 
                  	} ?>
          	</ul>
          	<?php }?>
        </div>
      	<div class="menubox col-lg-8 col-md-6">
      		<div class="nav">
        		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      		</div>
      	</div>
      	<div class="search-box col-lg-2 col-md-3 cart_links">
      		<span><i class="fas fa-search"></i></span>
      			<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_cart_page_id') ) ); ?>"><i class="fas fa-shopping-cart"></i></a>
      			<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-user"></i></a>
      	</div>
      </div>
    	<div class="serach_outer">
  		  <div class="closepop"><i class="far fa-window-close"></i></div>
  			<div class="serach_inner">
  				<?php get_search_form(); ?>
  			</div>
  	  </div>
  </div>	
</div>