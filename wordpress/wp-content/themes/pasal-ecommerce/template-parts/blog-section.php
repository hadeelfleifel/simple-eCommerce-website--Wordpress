<?php
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
$blog_description = $pasal_ecommerce_settings['blog_description'];
$blog_meta = $pasal_ecommerce_settings['pasal_ecommerce_entry_meta_blog'];

// for blog option
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'desc',
    'orderby' => 'menu_order date',

);
$query = new WP_query($args);
$loop = 1;

if ($query->have_posts()):
    ?>
    <div class="blog-section section">
        <div class="container">
            <div class="row">
                <?php
                $blog_posts_args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
                    'post__in' => (array)$blog_description,
                );
                $blog_variable = get_posts($blog_posts_args);
                echo '<div class="section-title">';
                foreach ($blog_variable as $key => $blog_value) {
                    $content = wp_kses_post($blog_value->post_content);
                    $content = preg_replace('/<img[^>]+./', '', $content);
                    echo '<h2>' . wp_kses_post(wp_trim_words($blog_value->post_title, 16)) . '</h2>';
                }
                echo '</div>';
                while ($query->have_posts()) : $query->the_post();
                    global $post;
                    $post_format = get_post_format($post->ID);

                    $blog_image = wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'full');;
                    $post_formats = get_post_format($post->ID);
                    $archive_year = get_the_time('Y');
                    $archive_month = get_the_time('m');

                if ($loop <= 3):
                    ?>
                    <div class="col-md-4">
                        <div class="post-wrap">
                            <?php
                            if ($post_format == 'video') {
                                $category = get_the_category();
                                echo '<div class="post-video-wrap"><div class="post-img-meta">
                            </div></div>';
                            }
                            pasal_ecommerce_blog_post_format($post_format, $post->ID);
                            ?>
                            <div class="post-review">
                                <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                                <?php
                                if($blog_meta == 'show-meta') {
                                    $comment_count = get_comments_number();
                                    $archive_year = get_the_time('Y');
                                    $archive_month = get_the_time('m');
                                    echo '<div class="entry-meta">';
                                    echo '<div class="author">';
                                    echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '">';
                                    ?>
                                    <span class="author-img"><?php echo get_avatar(get_the_author_meta('ID'), 32, '', 'author-image', '') ?></span>

                                    <?php echo '<span>' . get_the_author() . '</span></a></div>';
                                    if ($comment_count >= 0 && comments_open()) {
                                        echo '<div class="comments"><a href="' . esc_url(get_comments_link($post->ID)) . '"><i class="fa fa-comments-o"></i>';
                                        printf(
                                        /* translators: %s: comment number */
                                            _n('<span>%s</span>', '<span>%s</span>', get_comments_number($post->ID), 'pasal-ecommerce'), absint(number_format_i18n(get_comments_number($post->ID))));
                                        echo '</a></div>';
                                    }
                                    echo '<div class="date"><a href="' . esc_url(get_month_link($archive_year, $archive_month)) . '"><i class="fa fa-clock-o" aria-hidden="true"></i><span>' . esc_html(get_the_date()) . '</span></a></div></div>';
                                }
                                ?>
                                <p class="post-description"><?php echo wp_kses_post(pasal_ecommerce_get_excerpt(get_the_ID(), 125)); ?></p>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                   class="btn btn-default"><?php echo esc_html__('Read more', 'pasal-ecommerce'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php $loop++; endif; endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif;