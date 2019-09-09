<?php
/**
 * Displaying all single posts.
 * @package Ultimate Ecommerce Shop
 */

get_header(); ?>

<?php do_action( 'ultimate_ecommerce_shop_single_header' ); ?>

<div class="container-fluid">
	<div class="content-with-sidebar">
	    <div class="wrapper">
		    <?php
		        $layout = get_theme_mod( 'ultimate_ecommerce_shop_theme_options','Right Sidebar');
		        if($layout == 'One Column'){?>
		        	<div class="singlebox" id="main-content">
						<?php while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/post/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
			    <?php }else if($layout == 'Three Columns'){?>
			    	<div class="row">
				    	<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				       	<div class="col-lg-6 col-md-6 singlebox" id="main-content">
							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/post/single-post' );
				            endwhile; // end of the loop. ?>
				       	</div>
						<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					</div>
				<?php }else if($layout == 'Four Columns'){?>
					<div class="row">
				    	<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
				       	<div class="col-lg-3 col-md-3 singlebox" id="main-content">
							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/post/single-post' );
				            endwhile; // end of the loop. ?>
				       	</div>
						<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
						<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-3'); ?></div>  
					</div> 	
	       		<?php }else if($layout == 'Right Sidebar'){?>
	       			<div class="row">
				       	<div class="col-lg-8 col-md-8 singlebox" id="main-content">
							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/post/single-post' );
				            endwhile; // end of the loop. ?>
				       	</div>
						<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					</div>
				<?php }else if($layout == 'One Column'){?>
					<div class="row">
			       		<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
						<div class="col-lg-8 col-md-8 singlebox" id="main-content">
							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/post/single-post' );
				            endwhile; // end of the loop. ?>
				       	</div>	    
			       </div>
				<?php }else if($layout == 'Grid Layout'){?>
					<div class="row">
				       	<div class="col-lg-8 col-md-8 singlebox" id="main-content">
							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/post/single-post' );
				            endwhile; // end of the loop. ?>
				       	</div>
						<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					</div>
				<?php }else {?>
					<div class="row">
				       	<div class="col-lg-8 col-md-8 singlebox" id="main-content">
							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/post/single-post' );
				            endwhile; // end of the loop. ?>
				       	</div>
						<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					</div>
				<?php } ?>
	        <div class="clearfix"></div>
	    </div>
	</div>
</div>

<?php do_action( 'ultimate_ecommerce_shop_single_footer' ); ?>

<?php get_footer(); ?>