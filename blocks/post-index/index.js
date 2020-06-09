/* global wp */
/* global lodash */

/**
 * BLOCK: Post Index
 *
 * Shows a list of anchors
 * @author: Brando Meniconi <b.meniconi@silverbackstudio.it>
 */
import edit from './edit';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n; // Import __() from wp.i18n
const { 
	RichText,
} = wp.blockEditor;

/**
 * Register: Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
 
/**
 * Internal dependencies
 */
export const name = 'svbk/post-index';

export const settings = {
	title: __( 'Index', '_svbk' ),
	icon: 'editor-ul', 
	category: 'common',
	keywords: [
		__( 'index', '_svbk' ),
		__( 'article', '_svbk' ),
        __( 'post', '_svbk' ),
        __( 'content', '_svbk' ),
	],
	
	attributes: {
		title: {
			type: 'string',
			source: 'text',
			selector: '.wp-block-svbk-index__title',
		},
		anchors: {
			type: "array",
			default: [{
				text: '',
				url: ''
			}],
			source: "query",
			selector: ".wp-block-svbk-index__anchor",
			query: {
				text: {
					type: 'string',
					source: 'text',
		            selector: '.wp-block-svbk-index__anchor a',
				},
				url: {
					type: 'string',
					source: 'attribute',
					attribute: 'href',
					selector: '.wp-block-svbk-index__anchor a',
				},
			}
		}
	},	

	edit,

	save: function( { attributes } ) {

		const { 
			title,
			anchors,
		} = attributes;

		return (
			<div>
				<RichText.Content tagName={ 'p' } className={ 'wp-block-svbk-index__title' } value={ title } /> 		
				<ul>
				{
					anchors.map( ( anchor, index ) => (
						<li className={ 'wp-block-svbk-index__anchor'} key={ index }>
							<a href={ anchor.url }>{ anchor.text }</a>
						</li>
					) )
				}
				</ul>
			</div>
		);
	},
};