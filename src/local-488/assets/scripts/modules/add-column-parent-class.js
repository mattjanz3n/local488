export default function addColumnClassParent() {
	$( '.wp-block-column' )
		.has( '.wp-block-columns' )
		.addClass( 'has_columns' );
}
