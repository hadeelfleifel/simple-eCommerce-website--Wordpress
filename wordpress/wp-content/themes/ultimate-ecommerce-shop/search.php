<?php
/**
 * Displaying Search Results pages.
 * @package Ultimate Ecommerce Shop
 * @subpackage ultimate-ecommerce-shop
 * @since 1.0
 */

get_header(); ?>

<?php /** post section **/ ?>
<div class="container-fluid">
    <div class="content-with-sidebar">    
        <?php
            $layout = get_theme_mod( 'ultimate_ecommerce_shop_theme_options','Right Sidebar');
            if($layout == 'One Column'){?>      
                <div id="firstbox" >                
                    <?php if ( have_posts() ) : ?>
                        <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/content', get_post_format() ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                            ));
                        ?>
                    </div>                
                </div>
                <div class="clearfix"></div>
            <?php }else if($layout == 'Three Columns'){?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                    <div id="firstbox" class="col-lg-6 col-md-6">                
                        <?php if ( have_posts() ) : ?>
                            h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            
                            while ( have_posts() ) : the_post();

                              get_template_part( 'template-parts/post/content', get_post_format() ); 
                            
                            endwhile;

                            else : ?>

                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                                <?php
                                get_search_form();

                            endif; 
                        ?>
                        <div class="navigation">
                          <?php
                              // Previous/next page navigation.
                              the_posts_pagination( array(
                                  'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                  'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                              ) );
                          ?>
                        </div>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                </div>
            <?php }else if($layout == 'Four Columns'){?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                    <div id="firstbox" class="col-lg-3 col-md-3">                
                        <?php if ( have_posts() ) : ?>
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            
                            while ( have_posts() ) : the_post();

                              get_template_part( 'template-parts/post/content', get_post_format() ); 
                            
                            endwhile;

                            else : ?>

                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                                <?php
                                get_search_form();

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                    'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                                ) );
                            ?>
                        </div>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
                </div>
            <?php }else if($layout == 'Right Sidebar'){?>
                <div class="row">
                    <div id="firstbox" class="col-lg-8 col-md-8">                
                        <?php if ( have_posts() ) : ?>
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            
                            while ( have_posts() ) : the_post();

                              get_template_part( 'template-parts/post/content', get_post_format() ); 
                            
                            endwhile;

                            else : ?>

                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                                <?php
                                get_search_form();

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                    'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                </div>
            <?php }else if($layout == 'Left Sidebar'){?>
                <div class="row">
                    <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                    <div id="firstbox" class="col-lg-8 col-md-8">                
                        <?php if ( have_posts() ) : ?>
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            
                            while ( have_posts() ) : the_post();

                              get_template_part( 'template-parts/post/content', get_post_format() ); 
                            
                            endwhile;

                            else : ?>

                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                                <?php
                                get_search_form();

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                    'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                                ) );
                            ?>
                        </div>
                    </div>   
                </div>
            <?php }else if($layout == 'Grid Layout'){?>
                <div id="firstbox">                
                    <?php if ( have_posts() ) : ?>
                        <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                    <?php endif; ?>
                    <div class="row">
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            
                            while ( have_posts() ) : the_post();

                              get_template_part( 'template-parts/post/grid-layout' ); 
                            
                            endwhile;

                            else : ?>

                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                                <?php
                                get_search_form();

                            endif; 
                        ?>
                    </div>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                            ));
                        ?>
                    </div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div id="firstbox" class="col-lg-8 col-md-8">                
                        <?php if ( have_posts() ) : ?>
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','ultimate-ecommerce-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ultimate-ecommerce-shop' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            
                            while ( have_posts() ) : the_post();

                              get_template_part( 'template-parts/post/content', get_post_format() ); 
                            
                            endwhile;

                            else : ?>

                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultimate-ecommerce-shop' ); ?></p>
                                <?php
                                get_search_form();

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'ultimate-ecommerce-shop' ),
                                    'next_text'          => __( 'Next page', 'ultimate-ecommerce-shop' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ultimate-ecommerce-shop' ) . ' </span>',
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                </div>
        <?php } ?>   
    </div> 
</div>

<?php get_footer(); ?>