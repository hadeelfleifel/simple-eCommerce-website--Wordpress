<?php
/**
 * Utils functions used in about page and in customizer notifications.
 *
 * @package Pasal-ecommerce
 */
function create_action_link( $state, $slug ) {
    $active_slug= $slug;
    if($slug =='contact-form-7')
        $active_slug='wp-contact-form-7';
	switch ( $state ) {
		case 'install':
			return wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => $slug,
					),
					network_admin_url( 'update.php' )
                ),
				'install-plugin_' . $active_slug
			);
			break;
		case 'deactivate':
			return add_query_arg(
				array(
					'action'        => 'deactivate',
					'plugin'        => rawurlencode( $slug . '/' . $active_slug . '.php' ),
					'plugin_status' => 'all',
					'paged'         => '1',
					'_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $slug . '/' . $active_slug . '.php' ),
				), network_admin_url( 'plugins.php' )
			);
			break;
		case 'activate':
			return add_query_arg(
				array(
					'action'        => 'activate',
					'plugin'        => rawurlencode( $slug . '/' . $active_slug . '.php' ),
					'plugin_status' => 'all',
					'paged'         => '1',
					'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug . '/' . $active_slug . '.php' ),
				), network_admin_url( 'plugins.php' )
			);
			break;
	}// End switch().
}