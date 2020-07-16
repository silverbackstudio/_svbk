<?php

namespace Svbk\WP\Theme\_svbk;

class Post_List_Block extends Post_List {

	/**
	 * The block name
	 */
	public $block_name = '';

	/**
	 * The block registration args
	 *
	 * @var $block_args
	 */
	public $block_args = [];

	/**
	 * The default block attributes
	 */
	public static $default_attributes = array(
		'align' => array(
			'type' => 'string',
		),
		'categories' => array(
			'type' => 'string',
		),
		'className' => array(
			'type' => 'string',
		),
		'postsToShow' => array(
			'type'    => 'number',
			'default' => 5,
		),
		'display' => array(
			'type'    => 'string',
			'default' => 'excerpt',
		),
		'excerptLength' => array(
			'type'    => 'number',
			'default' => 55,
		),
		'postLayout' => array(
			'type'    => 'string',
			'default' => 'list',
		),
		'columns' => array(
			'type'    => 'number',
			'default' => 3,
		),
		'align' => array(
			'type' => 'string',
		),
		'order' => array(
			'type'    => 'string',
			'default' => 'desc',
		),
		'orderBy' => array(
			'type'    => 'string',
			'default' => 'date',
		),
		'offset' => array(
			'type'    => 'number',
			'default' => 0,
		),
		'loadMore' => array(
			'type'    => 'boolean',
			'default' => false,
		),
	);

	/**
	 * Create an instance and register the block
	 *
	 * @param array $properties The class paramenters
	 *
	 * @return void
	 */
	public function __construct( $post_type, $properties = array() ) {

		if ( empty( $properties['block_name'] ) ) {
			$this->block_name = 'svbk/' . $post_type;
		}

		parent::__construct( $post_type, $properties );

		$this->register_block();
	}

	/**
	 * Register the block
	 *
	 * @return void
	 */
	public function register_block() {

		register_block_type(
			$this->block_name,
			array_replace_recursive(
				array(
					'attributes'      => self::$default_attributes,
					'render_callback' => array( $this, 'render' ),
					'editor_script'   => '_svbk-blocks',
				),
				$this->block_args
			)
		);

	}

	/**
	 * Render whole posts list
	 *
	 * @param array $block_attributes The block attributes
	 *
	 * @return string
	 */
	public function render( $block_attributes ) {

		// Format defaults from block attributes.
		$defaults = array_map(
			function( $attr ) {
				return isset( $attr->default ) ? $attr->default : '';
			},
			self::$default_attributes
		);

		$attributes = shortcode_atts( $defaults, $block_attributes );

		$attributes['posts_per_page'] = $attributes['postsToShow'];
		$attributes['orderby']        = $attributes['orderBy'];
		$attributes['load_more']      = $attributes['loadMore'];

		$classes = array( 'wp-block-' . str_replace( '/', '-', $this->block_name ) );

		if ( isset( $block_attributes['align'] ) ) {
			$classes[] = 'align' . $block_attributes['align'];
		}

		if ( isset( $block_attributes['postLayout'] ) && 'grid' === $block_attributes['postLayout'] ) {
			$classes[] = 'is-grid';
		}

		if ( isset( $block_attributes['columns'] ) && 'grid' === $block_attributes['postLayout'] ) {
			$classes[] = 'columns-' . $block_attributes['columns'];
		}

		if ( isset( $block_attributes['className'] ) ) {
			$classes[] = $block_attributes['className'];
		}

		$attributes['container_class'] = join( $classes, ' ' );

		return parent::render( $attributes );
	}

	/**
	 * Render an single post
	 *
	 * @param array $attributes The input attributes
	 *
	 * @return void
	 */
	public function render_post( $attributes ) {
		switch ( $attributes['display'] ) {
			case 'full_post':
				get_template_part( 'template-parts/content', $this->post_type );
				break;
			case 'excerpt':
			default:
				get_template_part( 'template-parts/preview', $this->post_type );
				break;
		}
	}

}
