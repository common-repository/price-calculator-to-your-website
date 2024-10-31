<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_Shortcode
{

	/*
	* MXPCTYW_Shortcode
	*/
	public function __construct()
	{

	}

	/*
	* Create shortcode
	*/
	public static function create_shortcode() 
	{
		
		add_shortcode( 'mxpctyw_price_calc', function( $args ) {

			if( $args == '' ) return;

			if( $args['id'] == NULL ) return;

			$res = mxpctyw_get_calc_by_id( $args['id'] );

			if( $res == NULL ) return;	

			ob_start(); ?>

				<?php $data = maybe_unserialize( $res->calc_options ); ?>

				<!-- style ... -->
				<style>
					/*font*/
					<?php if( $data['calc_font'] !== 'default' ) : ?>
						.mx-calc-wrap,
						.mx-calc-wrap h4,
						.mx-calc-wrap h3,
						.mx-calc-wrap span,
						.mx-calc-wrap input {
							font-family: '<?php echo $data['calc_font']; ?>' !important;
						}
					<?php endif; ?>

					/*bg*/
					<?php if( $data['calc_bg_color'] !== '' ) : ?>
						.mx-calc-wrap {
							background-color: <?php echo $data['calc_bg_color']; ?> !important;
						}
					<?php endif; ?>

					/*max-width*/
					<?php if( $data['calc_max_width'] !== '' ) : ?>
						.mx-calc-wrap {
							max-width: <?php echo $data['calc_max_width']; ?>px !important;
						}
					<?php endif; ?>
					
				</style>
				<!-- ...style -->

				<div class="mx-calc-wrap">
					
					<h3><?php echo esc_html_e( $data['calc_name'], 'mxpctyw-domain' ); ?></h3>

					<div class="mx-calc-body">

						<?php foreach( $data['elements'] as $key => $value ) : ?>

							<!-- item ... -->
							<div class="mx-calc-item">

								<h4>
									<?php echo esc_html_e( $value['name'], 'mxpctyw-domain' ); ?>
									<span><?php echo esc_html_e( $value['item_price'], 'mxpctyw-domain' ); ?><?php echo esc_html_e( $data['calc_currency'], 'mxpctyw-domain' ); ?> </span>/
									<span><?php echo esc_html_e( $value['item_name'], 'mxpctyw-domain' ); ?></span>
								</h4>

								<div class="mx-calc-item-progress">

									<span><?php echo esc_html_e( $value['desc'], 'mxpctyw-domain' ); ?></span>

									<input type="number" min="1" step="1" data-calc-item-price="<?php echo esc_html_e( $value['item_price'], 'mxpctyw-domain' ); ?>" class="mx-calc-user-enter" />

									<span>Price: </span><span class="mx-calc-price-result">0</span>
									<span><?php echo esc_html_e( $data['calc_currency'], 'mxpctyw-domain' ); ?></span>

								</div>
								
							</div>
							<!-- ... item -->

						<?php endforeach; ?>
						
					</div>

					<div class="mx-calc-footer">

						<button class="mxCalcCount">Calculate</button>

						<div id="mx-calc-result">
							<span>Amount: </span>
							<span class="mxCalcShowAmonut">0</span>
							<span><?php echo $data['calc_currency']; ?></span>
						</div>
					</div>

				</div>

			<?php return ob_get_clean();

		} );

	}
	
}