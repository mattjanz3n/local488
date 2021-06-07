//=================================\\
// Select anf opstions styles \\
//=================================\\
const localOption = $( '.gfield_select' );

export default function selectStyle() {
	if ( localOption.length ) {
		$( document ).ready( function () {
			$( '.gfield_select' ).select2();
		} );
	}
}
