<?php
/**
 * Resortica Customizer Notification System.
 *
 * @package Pasal-ecommerce
 */


/**
 * TI Customizer Notify Class
 */
class pasal_ecommerce_Customizer_Notify {

	/**
	 * Recommended actions
	 *
	 * @var array $recommended_actions Recommended actions displayed in customize notification system.
	 */
	private $recommended_actions;

	/**
	 * Recommended plugins
	 *
	 * @var array $recommended_plugins Recommended plugins displayed in customize notification system.
	 */
	private $recommended_plugins;

	/**
	 * The single instance of pasal_ecommerce_Customizer_Notify
	 *
	 * @var pasal_ecommerce_Customizer_Notify $instance The pasal_ecommerce_Customizer_Notify instance.
	 */
	private static $instance;

	/**
	 * Title of Recommended actions section in customize
	 *
	 * @var string $recommended_actions_title Title of Recommended actions section displayed in customize notification system.
	 */
	private $recommended_actions_title;

	/**
	 * Title of Recommended plugins section in customize
	 *
	 * @var string $recommended_plugins_title Title of Recommended plugins section displayed in customize notification system.
	 */
	private $recommended_plugins_title;

	/**
	 * Dismiss button label
	 *
	 * @var string $dismiss_button Dismiss button label displayed in customize notification system.
	 */
	private $dismiss_button;

	/**
	 * Install button label for plugins
	 *
	 * @var string $install_button_label Label of install button for plugins displayed in customize notification system.
	 */
	private $install_button_label;

	/**
	 * Activate button label for plugins
	 *
	 * @var string $activate_button_label Label of activate button for plugins displayed in customize notification system.
	 */
	private $activate_button_label;

	/**
	 * Deactivate button label for plugins
	 *
	 * @var string $deactivate_button_label Label of deactivate button for plugins displayed in customize notification system.
	 */
	private $deactivate_button_label;

	/**
	 * The Main pasal_ecommerce_Customizer_Notify instance.
	 *
	 * We make sure that only one instance of pasal_ecommerce_Customizer_Notify exists in the memory at one time.
	 *
	 * @param array $config The configuration array.
	 */
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof pasal_ecommerce_Customizer_Notify ) ) {
			self::$instance = new pasal_ecommerce_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	public function setup_config() {

		// global arrays for recommended plugins/actions
		global $acp_customizer_notify_recommended_plugins;
		global $acp_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$acp_customizer_notify_recommended_plugins = array();
		$acp_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$acp_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$acp_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$deactivate_button_label = isset( $this->config['deactivate_button_label'] ) ? $this->config['deactivate_button_label'] : '';

	}

	/**
	 * Setup the actions used for this class.
	 */
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'pasal_ecommerce_customizer_notify_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'pasal_ecommerce_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_acp_customizer_notify_dismiss_recommende_d_action', array( $this, 'pasal_ecommerce_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_acp_customizer_notify_dismiss_recommended_plugins', array( $this, 'pasal_ecommerce_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	/**
	 * Scripts and styles used in the pasal_ecommerce_Customizer_Notify class
	 */
	public function pasal_ecommerce_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );
		wp_localize_script(
			'acp-customizer-notify-customizer-js', 'tiCustomizerNotifyObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'pasal-ecommerce' ),
			)
		);

	}

	/**
	 * Register the section for the recommended actions/plugins in customize
	 *
	 * @param object $wp_customize The customizer object.
	 */
	public function pasal_ecommerce_customizer_notify_customize_register( $wp_customize ) {

		/**
		 * Include the pasal_ecommerce_Customizer_Notify_Section class.
		 */
		require_once get_template_directory() . '/information/class-pasal-ecommerce-customizer-notify-section.php';

		$wp_customize->register_section_type( 'pasal_ecommerce_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new pasal_ecommerce_Customizer_Notify_Section(
				$wp_customize,
				'acp-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	/**
	 * Dismiss recommended actions
	 */
	public function pasal_ecommerce_customizer_notify_dismiss_recommended_action_callback() {

		global $acp_customizer_notify_recommended_actions;
		$action_id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval($_GET['id'] ) : 0;

		echo $action_id; /* this is needed and it's the id of the dismissable recommended action */

		if ( ! empty( $action_id ) ) {

			/* if the option exists, update the record for the specified id */
			if ( get_option( 'pasal_ecommercecustomizer_notify_show_recommended_actions' ) ) {

				$acp_customizer_notify_show_recommended_actions = get_option( 'pasal_ecommercecustomizer_notify_show_recommended_actions' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$acp_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$acp_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'pasal_ecommercecustomizer_notify_show_recommended_actions', $acp_customizer_notify_show_recommended_actions );

				/* create the new option,with false for the specified id */
			} else {
				$acp_customizer_notify_show_recommended_actions_new = array();
				if ( ! empty( $acp_customizer_notify_recommended_actions ) ) {
					foreach ( $acp_customizer_notify_recommended_actions as $acp_customizer_notify_recommended_action ) {
						if ( $acp_customizer_notify_recommended_action['id'] == $action_id ) {
							$acp_customizer_notify_show_recommended_actions_new[ $acp_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$acp_customizer_notify_show_recommended_actions_new[ $acp_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'pasal_ecommercecustomizer_notify_show_recommended_actions', $acp_customizer_notify_show_recommended_actions_new );
				}
			}
		}
		die(); // this is required to return a proper result
	}

	/**
	 * Dismiss recommended plugins
	 */
	public function pasal_ecommerce_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval($_GET['id'] ) : 0;

		echo $action_id; /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {
			/* if the option exists, update the record for the specified id */
			$acp_customizer_notify_show_recommended_plugins = get_option( 'pasal_ecommercecustomizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$acp_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$acp_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'pasal_ecommercecustomizer_notify_show_recommended_plugins', $acp_customizer_notify_show_recommended_plugins );
		}
		die(); // this is required to return a proper result
	}

}