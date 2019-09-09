jQuery( document ).ready( function() {

	jQuery( 'body' ).on( 'click', '.remove_currency', function( event ) {

		event.preventDefault();

		jQuery( this ).parents( 'tr:first' ).remove();

	} );

	jQuery( 'body' ).on( 'click', '.add_currency', function( event ) {

		event.preventDefault();

		jQuery( 'tbody.wc_currencies' ).append( wc_custom_currencies.currency_row );

	} );

} );