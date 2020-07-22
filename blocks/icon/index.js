/**
 * WordPress dependencies
 */
const { RawHTML } = wp.element;
const { __ } = wp.i18n;
const { 
	getColorClassName
} = wp.blockEditor;

/**
 * Internal dependencies
 */
import edit from './edit';

export const name = 'svbk/icon';

export const settings = {
	title: __( 'Icon (SVG)', '_svbk' ),

	description: __( 'Insert an SVG Icon', '_svbk' ),

	icon: 'star-filled',

	category: 'common',

	keywords: [ 
	    __( 'svg', '_svbk' ),
	    __( 'icon', '_svbk' )
	],

	supports: {
		html: false,
	},

	attributes: {
		icon: {
			type: 'string',
			source: 'html',
            selector: '.wp-block-svbk-icon',
		},
		textColor: {
			type: 'string',
		},		
	},

	edit,

	save( { attributes } ) {
	    
	    const { textColor } = attributes;
	    const textClass = getColorClassName( 'color', textColor );
	
		return ( 
			<div className={ textClass } >
				<RawHTML>{ attributes.icon }</RawHTML>
			</div> 
		);
	},
};