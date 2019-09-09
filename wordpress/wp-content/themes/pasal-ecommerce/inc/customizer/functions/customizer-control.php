<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


/**
 * Multiple select customize control class.
 */
class pasal_ecommerce_Customize_Control_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
}

class pasal_ecommerce_Support_Control extends WP_Customize_Control {

    /**
     * Render the content on the theme customizer page
     */
    public $type = "pasal-ecommerce-support";

    public function enqueue() {
        wp_enqueue_style( 'pasal-ecommerce-customizer-style', trailingslashit( get_template_directory_uri() ) . '/inc/customizer/css/customizer-control.css' );
        /* js */
    }

    public function render_content() {
        //Add Theme instruction, Support Forum, Demo Link, Rating Link

        ?><p>
        <a class="pasal-ecommerce-support" target="_blank" href="<?php echo esc_url('https://docs.codethemes.co/docs/pasal-ecommerce/'); ?>"><span class="dashicons dashicons-book-alt"></span><?php echo  esc_html__('Documentation', 'pasal-ecommerce') ?></a>

        <a class="pasal-ecommerce-support" target="_blank" href="<?php echo  esc_url('http://codethemes.co/my-tickets/') ?>"><span class="dashicons dashicons-edit"></span><?php echo esc_html__('Create a Ticket', 'pasal-ecommerce') ?></a>

        <a class="pasal-ecommerce-support" target="_blank" href="<?php echo ('https://codethemes.co/product/pasal-ecommerce/?add-to-cart=11198'); ?>"><span class="dashicons dashicons-star-filled"></span><?php echo esc_html__('Buy Premium', 'pasal-ecommerce') ?></a>

        <a class="support-image pasal-ecommerce-support" target="_blank" href="<?php echo  esc_url('http://codethemes.co/support/#customization_support') ?>"><img src = "<?php echo esc_url(get_template_directory_uri() . '/assets/img/wparmy.png') ?>" /> <?php echo esc_html__('Request Customization', 'pasal-ecommerce'); ?></a>
        </p>
        <?php
    }
}

function pasal_ecommerce_theme_customize_style() {
     wp_enqueue_script( 'pasal-ecommerce-customizer-jss', get_template_directory_uri() . '/inc/customizer/assets/customizer.js', array('jquery'), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'pasal_ecommerce_theme_customize_style');

