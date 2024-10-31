<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$calc_id = $_GET['calc'];

$res = mxpctyw_get_calc_by_id( $calc_id );

// exit if the result is not found
if( $res == NULL ) {

	$back_url = get_admin_url() . 'admin.php?page=' . MXPCTYW_MAIN_MENU_SLUG;

	?>
		<script> window.location.href = '<?php echo $back_url; ?>'; </script>
	<?php

	die( '<a href="' . $back_url . '">Something went wrong. Come back.</a>' );

}

$data = maybe_unserialize( $res->calc_options );

?>

<h1 class="text-secondary">Customize Calculator</h1>

<form id="mxpctyw_calc_create" class="mx-settings" method="post" action="">

	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_name_of_the_calc">Calculator Name <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="mx_name_of_the_calc" name="mx_name_of_the_calc" value="<?php echo $data['calc_name']; ?>" placeholder="For example: Repair calculator" required />	
		</div>

	</div>

	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_name_of_the_calc">Currency <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="mx_currency_of_the_calc" name="mx_currency_of_the_calc" value="<?php echo $data['calc_currency']; ?>" placeholder="For example: $" required />	
		</div>

	</div>

	<!-- area of creating a new price_calcs  -->
	
	<!-- Working block -->
	<div class="mx-block_wrap_price" id="mxpctyw_price_calcs_wrap">

		<?php if( $data['elements'] !== NULL ) : ?>
		
			<?php foreach( $data['elements'] as $key => $value ) : ?>

				<?php $element_id = $key + 1; ?>

				<!-- price_calc wrap -->
				<div class="mxpctyw_price_calc_wrap" data-id="<?php echo $element_id; ?>">

					<div class="mx_number_of_price_calc">
						<span class="mx_number_of_price_calc_s">#</span>
						<span class="mx_number_of_price_calc_n"><?php echo $element_id; ?></span>
					</div>

					<button type="button" class="mx-open_price_calc_box"><i class="fa fa-angle-down"></i></button>

					<button type="button" class="mx-add_price_calc" title="Добавить элемент"><i class="fa fa-plus"></i></button>

					<button type="button" class="mx-del_price_calc" title="Удалить"><i class="fa fa-trash"></i></button>
						
					<div class="form-group mx-form-group_first">

						<small class="form-text text-dark">Counting element name *</small><br>
						<input type="text" class="mx_new_price_calc_name form-control mx-is_required" name="mx_new_price_calc_name" placeholder="For example: Laminate" value="<?php echo $value['name']; ?>" />
						<hr>

						<small class="form-text text-dark">Description</small>
						<textarea name="mx_new_price_calc_desc" class="mx_new_price_calc_desc form-control" placeholder="For example: How many meters"><?php echo $value['desc']; ?></textarea>

						<div>
							
							<small class="form-text text-dark">Unit of measurement *</small>
							<input type="text" name="mx_new_price_calc_item_name" class="mx_new_price_calc_item_name form-control mx-is_required" placeholder="For example: 1 m" value="<?php echo $value['item_name']; ?>" />
							
							<small class="form-text text-dark">Price *</small>
							<input type="number" step="0.01" name="mx_new_price_calc_item_price" class="mx_new_price_calc_item_price form-control mx-is_required mx-is_coordinates" placeholder="For example: 7" value="<?php echo $value['item_price']; ?>" />
							
						</div>

					</div>

				</div>
				<!-- price_calc wrap -->

			<?php endforeach; ?>

		<?php endif; ?>

	</div>

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
				<option value="default" <?php echo $data['calc_font'] == 'default' ? 'selected' : ''; ?>>Default</option>
				<option value="RobotoCondensedRegular" style="font-family: 'RobotoCondensedRegular';" <?php echo $data['calc_font'] == 'RobotoCondensedRegular' ? 'selected' : ''; ?>>Roboto</option>
				
				<option value="Montserrat-Regular" style="font-family: 'Montserrat-Regular';" <?php echo $data['calc_font'] == 'Montserrat-Regular' ? 'selected' : ''; ?>>Montserrat</option>
				
				<option value="MyriadPro-Regular" style="font-family: 'MyriadPro-Regular';" <?php echo $data['calc_font'] == 'MyriadPro-Regular' ? 'selected' : ''; ?>>MyriadPro</option>
				
				<option value="Nostalgia" style="font-family: 'Nostalgia';" <?php echo $data['calc_font'] == 'Nostalgia' ? 'selected' : ''; ?>>Nostalgia</option>
				
				<option value="OpenSans" style="font-family: 'OpenSans';" <?php echo $data['calc_font'] == 'OpenSans' ? 'selected' : ''; ?>>OpenSans</option>
				
				<option value="PTSansPro-Light" style="font-family: 'PTSansPro-Light';" <?php echo $data['calc_font'] == 'PTSansPro-Light' ? 'selected' : ''; ?>>PTSans</option>

			</select>
		</div>

	</div>
	<!-- ... fonts -->

	<!-- max-with ... -->
	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_max_width_of_the_calc">Maximum calculator width: </label>
			<input type="number" name="mx_max_width_of_the_calc" id="mx_max_width_of_the_calc" value="<?php echo $data['calc_max_width']; ?>" min="100" />
			<span>px</span>
		</div>

	</div>
	<!-- ... max-with -->

	<!-- bg-color ... -->
	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_max_bg_color_of_the_calc">Calculator background color: </label>
			<input type="text" name="mx_max_bg_color_of_the_calc" id="mx_max_bg_color_of_the_calc" value="<?php echo $data['calc_bg_color']; ?>" />
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

<div class="mx-block_wrap_price">

	<div class="form-group">
		<h4>The shortcode:</h4>
		<span class="mx-shordcode-calc">
			[mxpctyw_price_calc id="<?php echo $calc_id; ?>"]
		</span>
	</div>		

</div>

<div class="mx-block_wrap_price" style="background: #e4f9e2;">

	<div class="form-group">
		<h4>Is the plugin useful to you?</h4>
		<a href="https://wordpress.org/plugins/price-calculator-to-your-website/#reviews" target="_blank">Please leave a review here</a> or <a href="https://wordpress.org/support/plugin/price-calculator-to-your-website/" target="_blank">write your wishes here</a>.

		<br><br>
		Also, visit my website <a href="https://markomaksym.com.ua/ru/glavnaya/" target="_blank">markomaksym.com.ua</a>

		<br><br>
		<b>Thank you for using the Site Price Calculator plugin. I am pleased to :)</b>
	</div>		

</div>

<!-- Variables for javascript with translation functions -->
<?php include( 'components/js_vars.php' ); ?>