jQuery( document ).ready( function( $ ){

	$( '.mx-calc-user-enter' ).each( function() {

		$( this ).on( 'change', function() {

			var price = parseFloat( $( this ).attr( 'data-calc-item-price' ) );

			var _val = $( this ).val();

			var amount = parseFloat( price * _val ).toFixed( 2 );

			$( this ).parent().find( '.mx-calc-price-result' ).text( amount );

		} );

	} );

	$( '.mxCalcCount' ).on( 'click', function( e ) {

		e.preventDefault();

		var calc_wrapper = $( this ).parent().parent();

		var _amount = 0;

		$( calc_wrapper ).find( '.mx-calc-price-result' ).each( function() {

			_amount = _amount + parseFloat( $( this ).text() );

		} ).promise().done( function() {

			var sum = parseFloat( _amount ).toFixed( 2 );

			$( calc_wrapper ).find( '.mxCalcShowAmonut' ).text( sum );

		} );

	} );

} );