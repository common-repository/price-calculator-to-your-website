<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<table>
	<tr>
		<td>
			<h1 class="text-secondary">List of Calculators</h1>
		</td>
		<td>
			<a href="<?php echo admin_url() . 'admin.php?page=' . MXPCTYW_ADD_NEW_CALC_SLUG; ?>" class="button-primary">Add new</a>
		</td>
	</tr>
</table>

<table class="wp-list-table widefat fixed striped pages">

	<thead>
		<tr>
			<th class="manage-column column-title column-primary">
				<span>Calculator</span>
			</th>

			<th class="manage-column column-title column-primary">
				<span>Shortcode</span>
			</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach( $data as $key => $value ) : ?>

			<?php $calc_options = maybe_unserialize( $value->calc_options ); ?>

			<!-- calc item ... -->
			<tr class="iedit author-self level-0 post-25 type-page status-publish hentry">
				<td class="title column-title has-row-actions column-primary page-title">

					<strong>
						<a class="row-title" href="<?php echo admin_url() . 'admin.php?page=' .MXPCTYW_ADD_EDIT_CALC_SLUG . '&calc=' . $value->id; ?>"><?php echo $calc_options['calc_name']; ?></a>
					</strong>

					<div class="row-actions">
						<span class="edit"><a href="<?php echo admin_url() . 'admin.php?page=' .MXPCTYW_ADD_EDIT_CALC_SLUG . '&calc=' . $value->id; ?>">Edit</a> | </span>
						<span class="trash"><a href="#<?php echo $value->id; ?>" data-calc-id="<?php echo $value->id; ?>" class="submitdelete mx-remove-calc">Delete</a> </span>
					</div>

				</td>

				<td><span>[mxpctyw_price_calc id="<?php echo $value->id; ?>"]</span></td>	
			</tr>
			<!-- ... calc item -->

		<?php endforeach; ?>


	</tbody>	

</table>