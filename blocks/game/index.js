( function ( wp ) {
	'use strict';

	var el = wp.element.createElement;
	var __ = wp.i18n.__;

	wp.blocks.registerBlockType( 'wdgames/game', {
		edit: function ( props ) {
			return el(
				'div',
				wp.blockEditor.useBlockProps(),
				el(
					wp.blockEditor.InspectorControls,
					null,
					el(
						wp.components.PanelBody,
						{ title: __( 'Game', 'woo-discount-games' ) },
						el( wp.components.SelectControl, {
							label: __( 'Game type', 'woo-discount-games' ),
							value: props.attributes.game,
							options: [
								{ label: __( 'Spin the wheel', 'woo-discount-games' ), value: 'wheel' },
								{ label: __( 'Pick a box', 'woo-discount-games' ), value: 'box' },
								{ label: __( 'Scratch card', 'woo-discount-games' ), value: 'scratch' }
							],
							onChange: function ( value ) {
								props.setAttributes( { game: value } );
							}
						} )
					)
				),
				el( wp.serverSideRender, { block: 'wdgames/game', attributes: props.attributes } )
			);
		},
		save: function () {
			return null;
		}
	} );
}( window.wp ) );

