<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<h1 class="text-secondary">Customize Calculator</h1>

<form id="mxpctyw_calc_create" class="mx-settings" method="post" action="">

	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_name_of_the_calc">Calculator Name <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="mx_name_of_the_calc" name="mx_name_of_the_calc" value="" placeholder="For example: Repair calculator" required />	
		</div>

	</div>

	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_name_of_the_calc">Currency <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="mx_currency_of_the_calc" name="mx_currency_of_the_calc" value="" placeholder="For example: $" required />	
		</div>

	</div>

	<!-- area of creating a new price_calcs  -->
	
	<!-- Working block -->
	<div class="mx-block_wrap_price" id="mxpctyw_price_calcs_wrap"></div>

	<!-- This block is an example block structure. For JS -->
	<div class="mx-block_wrap_price" id="mxpctyw_price_calcs_wrap_example" style="display: none;">
		<?php include( 'components/add_price_calc_for_js.php' ); ?>
	</div>
	<!-- end JS block -->

	<!-- fonts ... -->
	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_font_of_the_calc">Font: </label>
			<select name="mx_font_of_the_calc" id="mx_font_of_the_calc">
				<option value="default">Default</option>
				<option value="RobotoCondensedRegular" style="font-family: 'RobotoCondensedRegular';">Roboto</option>
				<option value="Montserrat-Regular" style="font-family: 'Montserrat-Regular';">Montserrat</option>
				<option value="MyriadPro-Regular" style="font-family: 'MyriadPro-Regular';">MyriadPro</option>
				<option value="Nostalgia" style="font-family: 'Nostalgia';">Nostalgia</option>
				<option value="OpenSans" style="font-family: 'OpenSans';">OpenSans</option>
				<option value="PTSansPro-Light" style="font-family: 'PTSansPro-Light';">PTSans</option>

			</select>
		</div>

	</div>
	<!-- ... fonts -->

	<!-- max-with ... -->
	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_max_width_of_the_calc">Maximum calculator width: </label>
			<input type="number" name="mx_max_width_of_the_calc" id="mx_max_width_of_the_calc" value="600" min="100" />
			<span>px</span>
		</div>

	</div>
	<!-- ... max-with -->

	<!-- bg-color ... -->
	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_max_bg_color_of_the_calc">Calculator background color: </label>
			<input type="text" name="mx_max_bg_color_of_the_calc" id="mx_max_bg_color_of_the_calc" value="" />
		</div>

	</div>
	<!-- ... bg-color -->

	<div class="mx-block_wrap_price">

		<p class="mx-submit_button_wrap">
			<input type="hidden" id="mxpctyw_wpnonce" name="mxpctyw_wpnonce" value="<?php echo wp_create_nonce( 'mxpctyw_nonce_request' ) ;?>" />
			<input class="button-primary" type="submit" name="mxpctyw-submit" value="Create calculator" />
		</p>

	</div>

</form>

<div class="mx-block_wrap_price" style="background: #e4f9e2;">

	<div class="form-group">
		<h4>Is the plugin useful to you?</h4>
		<a href="https://wordpress.org/plugins/price-calculator-to-your-website/#reviews" target="_blank">Please leave a review here</a> or <a href="https://wordpress.org/support/plugin/price-calculator-to-your-website/" target="_blank">write your wishes here</a>.

		<br><br>
		Also, visit my website <a href="http://markomaksym.com.ua/" target="_blank">markomaksym.com.ua</a>

		<br><br>
		<b>Thank you for using the Site Price Calculator plugin. I am pleased to :)</b>
	</div>		

</div>

<!-- Variables for javascript with translation functions -->
<?php include( 'components/js_vars.php' ); ?>