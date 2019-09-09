/**
 * Main scripts file for the About Hestia Page
 *
 * @package Pasal-ecommerce
 */

/* global tiAboutPageObject */
/* global console */

jQuery( document ).ready(
	function () {

		/* If there are required actions, add an icon with the number of required actions in the About acp-about-page page -> Actions required tab */
		var acp_about_page_nr_actions_required = tiAboutPageObject.nr_actions_required;

		if ( (typeof acp_about_page_nr_actions_required !== 'undefined') && (acp_about_page_nr_actions_required !== '0') ) {
			jQuery( 'li.acp-about-page-w-red-tab a' ).append( '<span class="acp-about-page-actions-count">' + acp_about_page_nr_actions_required + '</span>' );
		}

		/* Dismiss required actions */
		jQuery( '.acp-about-page-required-action-button' ).click(
			function() {

				var id = jQuery( this ).attr( 'id' ),
				action = jQuery( this ).attr( 'data-action' );

				jQuery.ajax(
					{
						type      : 'GET',
						data      : { action: 'acp_about_page_dismiss_required_action', id: id, todo: action },
						dataType  : 'html',
						url       : tiAboutPageObject.ajaxurl,
						beforeSend: function () {
							jQuery( '.acp-about-page-tab-pane#actions_required h1' ).append( '<div id="temp_load" style="text-align:center"><img src="' + tiAboutPageObject.template_directory + '/acp-notifications/acp-about-page/images/ajax-loader.gif" /></div>' );
						},
						success   : function () {
							location.reload();
							jQuery( '#temp_load' ).remove();
							/* Remove loading gif */
						},
						error     : function (jqXHR, textStatus, errorThrown) {
							console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
						}
					}
				);
			}
		);
		// Remove activate button and replace with activation in progress button.
		jQuery( document ).on(
			'DOMNodeInserted','.activate-now', function () {
				var activateButton = jQuery( this );
				if (activateButton.length) {
					var url = jQuery( activateButton ).attr( 'href' );
					if (typeof url !== 'undefined') {
						// Request plugin activation.
						jQuery.ajax(
							{
								beforeSend: function () {
									jQuery( activateButton ).replaceWith( '<a class="button updating-message">' + tiAboutPageObject.activating_string + '...</a>' );
								},
								async: true,
								type: 'GET',
								url: url,
								success: function () {
									// Reload the page.
									location.reload();
								}
							}
						);
					}
				}
			}
		);
	}
);
