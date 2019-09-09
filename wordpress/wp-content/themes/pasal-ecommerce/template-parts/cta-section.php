<?php
$pasal_ecommerce_settings = pasal_ecommerce_get_theme_options();
$cta_description = $pasal_ecommerce_settings['cta_description'];
$cta_title = $pasal_ecommerce_settings['cta_title'];
$cta_button = $pasal_ecommerce_settings['cta_button'];
$cta_link = $pasal_ecommerce_settings['cta_link'];
$cta_background = $pasal_ecommerce_settings['cta_Backgroundimage'];

    if(($cta_button && $cta_link )|| $cta_description|| $cta_title ){?>

    <section id="promo" class="section promo text-center" style="background-image: url(<?php echo esc_url($cta_background); ?>);">
        <div class="container">
            <div class="row cta-wrap">
              
                   <div class="promo-content">
                    
                         <h2><?php echo esc_html($cta_title); ?> </h2>
                    
                        <p><?php echo esc_html($cta_description); ?> </p>
               </div>
                <?php 
                if($cta_button && $cta_link){
                    echo '<div class="cta-btn-wrap">';
                    echo '<a href="'.esc_url($cta_link).'" class="btn btn-default" target="_blank">'.esc_html($cta_button).'</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
<?php }?>
