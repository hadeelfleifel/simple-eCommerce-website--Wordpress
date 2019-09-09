( function( api ) {

	// Extends our custom "ultimate-ecommerce-shop" section.
	api.sectionConstructor['ultimate-ecommerce-shop'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );