<tr>
	<td class="name">
		<input type="text" name="labels[]" required="true" placeholder="Currency Label" value="<?php echo WooCommerceCustomCurrencies::currency_data( 'label', $args ); ?>" />
	</td>
	<td class="id">
		<input type="text" name="symbols[]" required="true" placeholder="Currency Symbol" value="<?php echo WooCommerceCustomCurrencies::currency_data( 'symbol', $args ); ?>" />
	</td>
	<td class="status">
		<input type="text" name="codes[]" required="true" placeholder="Currency Code" value="<?php echo WooCommerceCustomCurrencies::currency_data( 'code', $args ); ?>" />
	</td>
	<td>
		<button type="button" class="button remove_currency">Remove</button>
	</td>
</tr>