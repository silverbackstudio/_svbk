/* global wp */
/* global lodash */

const { Fragment, Component } = wp.element;
/**
 * External dependencies
 */
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { 
	RichText,
	URLInput
} = wp.blockEditor;

const { 
	ButtonGroup, 
	Button,
	Dashicon
} = wp.components;

class PostIndexEdit extends Component {

	constructor (props) {
		super(...arguments);
		
		this.updateAnchor	= this.updateAnchor.bind(this);
		this.addAnchor		= this.addAnchor.bind(this);		
		this.removeAnchor	= this.removeAnchor.bind(this);
	}

	addAnchor() {
		
		const {
			attributes: { anchors },
			setAttributes,
		} = this.props;

		let updatedAnchors = anchors.slice(0);
		
		updatedAnchors.push( {
			text: '',
			url: ''
		} );

		setAttributes( { anchors: updatedAnchors } );
	}

	removeAnchor( index ) {
		
		const {
			attributes: { anchors },
			setAttributes,
		} = this.props;
		
		anchors.splice(index, 1);

		setAttributes( { anchors: anchors.slice(0) } );
	}


	updateAnchor( index, update ) {
		
		const {
			attributes: { anchors },
			setAttributes,
		} = this.props;

		const updatedAnchors = anchors.slice(0);
		const updatedAnchor  = Object.assign( {}, anchors[index], update );
		
		updatedAnchors[index] = updatedAnchor;

		setAttributes( { anchors: updatedAnchors } );
	}

    render() {
    	
		const {
			attributes,
			setAttributes,
			className,
			isSelected
		} = this.props;

		const { 
			anchors,
			title,
		} = attributes;

		const classNames = classnames( className, {
			'is-selected': isSelected,
		} );
		
		return (
			<Fragment>
				<div className={ classNames } >
				    <div> 
						<RichText
	    			    	tagName={ 'h3' }
							value={ title }
							onChange={ ( value ) => setAttributes( { title: value } ) }
							placeholder={ __( 'Content index', '_svbk' ) }
							className={ 'wp-block-svbk-index__title' }
						/>
					</div>
					{ anchors.map( ( anchor, index ) => ( 
						<div className={ 'wp-block-svbk-index__anchor' } key={ index } >
							<RichText
								tagName={ 'p' }
								value={ anchor.text }
								onChange={ ( value ) => this.updateAnchor( index, { text: value } ) }
								placeholder={ __( 'Text...', '_svbk' ) }
							/>
							<form
								onSubmit={ ( event ) => event.preventDefault() }>
								<Dashicon icon="admin-links" />
								<URLInput
									value={ anchor.url }
									onChange={ ( value ) => this.updateAnchor( index, { url: value } ) }
								/>
								<Button icon="editor-break" label={ __( 'Apply' ) } type="submit" />
							</form>
							{ isSelected && (
								<div className={ 'wp-block-svbk-index__edit' } >
									<ButtonGroup>
										<Button isDestructive
											className={ 'wp-block-svbk-index__remove' }
											onClick={ () => { this.removeAnchor( index ); } }
										>
											{ __( 'Remove' , '_svbk' ) }
										</Button>
										<Button isPrimary 
											className={ 'wp-block-svbk-index__add' }
											onClick={ this.addAnchor }
										>
											{ __( 'Add' , '_svbk' ) }
										</Button>
									</ButtonGroup>
								</div>
							) }	
						</div>
					) ) }	
				</div>
			</Fragment>
		);
	}
    
}

export default PostIndexEdit;
