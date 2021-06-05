/**
 * BLOCK: local-488-slider
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { MediaUpload, InspectorControls } = wp.blockEditor;
const {
	Button,
	PanelBody,
	IconButton,
	TextareaControl,
	TextControl,
	SelectControl,
} = wp.components;
const { Fragment } = wp.element;

registerBlockType( 'cgb/block-local-488-slider', {
	title: __( 'Local-488 Slider' ),
	icon: 'welcome-widgets-menus',
	category: 'layout',
	keywords: [
		__( 'local-488-slider — CGB Block' ),
		__( 'CGB Example' ),
		__( 'create-guten-block' ),
	],

	attributes: {
		images: {
			type: 'array',
			default: [],
		},
		imageCaption: {
			type: 'string',
			default: '',
		},
		sectionWidth: {
			type: 'string',
			default: 'small',
		},
		imagePaddings: {
			type: 'string',
			default: '0',
		},
	},

	edit: ( props ) => {
		const handleAddImage = () => {
			const images = [ ...props.attributes.images ];
			images.push( {
				address: '',
				imageID: '',
				imageUrl: '',
				imageCaption: '',
				imagePaddings: '',
			} );
			props.setAttributes( { images } );
		};

		const handleRemoveImage = ( index ) => {
			const images = [ ...props.attributes.images ];
			images.splice( index, 1 );
			props.setAttributes( { images } );
		};

		const getImageButton = ( openEvent ) => {
			return (
				<div className="button-container">
					<Button
						onClick={ openEvent }
						className="button button-large"
					>
						Upload Image
					</Button>
				</div>
			);
		};

		let imageFields, imageDisplay, imagePreview;

		if ( props.attributes.images.length ) {
			imageFields = props.attributes.images.map( ( image, index ) => {
				return (
					<Fragment key={ index }>
						<IconButton
							className="grf__remove-image-address"
							icon="no-alt"
							label="Delete image"
							onClick={ () => handleRemoveImage( index ) }
						/>
						<div className="wrapper-image-repeater">
							<div className="image">
								<h4 className="image__title">Image</h4>
								<MediaUpload
									onSelect={ ( media ) => {
										const images = [
											...props.attributes.images,
										];
										images[ index ].imageAlt = media.alt;
										images[ index ].imageUrl = media.url;
										props.setAttributes( { images } );
									} }
									type="image"
									value={
										props.attributes.images[ index ].imageID
									}
									render={ ( { open } ) =>
										getImageButton( open )
									}
								/>
								<img
									className="content-image"
									src={
										props.attributes.images[ index ]
											.imageUrl
									}
									draggable="false"
								/>
							</div>
						</div>
						<TextareaControl
							onChange={ ( caption ) => {
								const images = [ ...props.attributes.images ];
								images[ index ].imageCaption = caption;
								props.setAttributes( { caption } );
							} }
							value={
								props.attributes.images[ index ].imageCaption
							}
							placeholder="Image Caption"
						/>
						<h5>Image paddings</h5>
						<TextControl
							onChange={ ( paddings ) => {
								const images = [ ...props.attributes.images ];
								images[ index ].imagePaddings = paddings;
								props.setAttributes( { paddings } );
							} }
							value={
								props.attributes.images[ index ].imagePaddings
							}
							type="number"
							placeholder="0px"
						/>
					</Fragment>
				);
			} );

			imageDisplay = props.attributes.images.map( ( image, index ) => {
				return (
					<figure
						className="image-slide__wrapp"
						style={ { paddingTop: image.imagePaddings } }
					>
						<img
							className="image-slide"
							data-image-index={ index }
							src={ image.imageUrl }
						/>
						<figcaption className="image-slide__caption">
							{ image.imageCaption }
						</figcaption>
					</figure>
				);
			} );

			imagePreview = (
				<div className="image__section">
					<div
						className={ `wrapper wrapper--width-${ props.attributes.sectionWidth }` }
					>
						<div className="images__wrap">{ imageDisplay }</div>
					</div>
				</div>
			);
		}

		return [
			<InspectorControls key="1">
				<PanelBody title={ __( 'Section Width' ) }>
					<SelectControl
						value={ props.attributes.sectionWidth }
						options={ [
							{ label: 'Large Width', value: 'large' },
							{ label: 'Small Width', value: 'small' },
						] }
						onChange={ ( sectionWidth ) =>
							props.setAttributes( { sectionWidth } )
						}
					/>
				</PanelBody>
				<PanelBody title={ __( 'Images' ) }>
					{ imageFields }
					<Button isDefault onClick={ handleAddImage.bind( this ) }>
						{ __( 'Add Images' ) }
					</Button>
				</PanelBody>
			</InspectorControls>,
			<div key="2" className={ props.className }>
				{ imagePreview }
			</div>,
		];
	},
	save: ( props ) => {
		const imageFields = props.attributes.images.map( ( image, index ) => {
			return (
				<figure
					className="image-slide__wrapp"
					style={ {
						paddingTop:
							image.imagePaddings === ''
								? '0px'
								: `${ image.imagePaddings }px`,
						paddingBottom:
							image.imagePaddings === ''
								? '0px'
								: `${ image.imagePaddings }px`,
					} }
				>
					<img
						className="image-slide"
						data-image-index={ index }
						src={ image.imageUrl }
						data-before-image={ image.imageUrl }
						data-after-image={ image.imageUrl }
					/>
					<figcaption className="image-slide__caption">
						{ image.imageCaption }
					</figcaption>
				</figure>
			);
		} );

		return (
			<div className={ props.className }>
				<div className="image-slider__section">
					<div
						className={ `wrapper wrapper--width-${ props.attributes.sectionWidth }` }
					>
						<div className="images__wrap">{ imageFields }</div>
					</div>
				</div>
			</div>
		);
	},
} );
