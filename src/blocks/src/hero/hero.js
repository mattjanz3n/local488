/**
 * BLOCK: Hero main
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import "./editor.scss";
import "./style.scss";

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const {
	InnerBlocks,
	RichText,
	MediaUpload,
	PlainText,
	InspectorControls,
} = wp.blockEditor;
const { ToggleControl, Button, PanelBody } = wp.components;
const { Fragment } = wp.element;

registerBlockType("cgb/block-hero", {
	title: __("Hero Main"),
	icon: "welcome-widgets-menus",
	category: "layout",
	keywords: [
		__("hero — CGB Block"),
		__("CGB Example"),
		__("create-guten-block"),
	],

	attributes: {
		imageAlt: {
			attribute: "alt",
			selector: ".hero-section__image",
		},
		imageUrl: {
			attribute: "src",
			selector: ".hero-section__image",
		},
		sectionType: {
			type: "boolean",
		},
	},

	edit: ({ attributes, className, setAttributes }) => {
		const { sectionType } = attributes;

		const getImageButton = (openEvent) => {
			if (!attributes.imageUrl) {
				return (
					<div className="button-container">
						<p>
							Upload an image file, pick one from your media library, or add one
							with a URL.
						</p>
						<Button onClick={openEvent} className="button button-large">
							Upload Image
						</Button>
					</div>
				);
			} else {
				return (
					<Button onClick={openEvent} className="button button-large">
						Change Image
					</Button>
				);
			}
		};

		return (
			<Fragment>
				<InspectorControls>
					<PanelBody title={__("Block settings")}>
						<MediaUpload
							onSelect={(media) => {
								setAttributes({ imageAlt: media.alt, imageUrl: media.url });
							}}
							type="image"
							value={attributes.imageID}
							render={({ open }) => getImageButton(open)}
						/>
					</PanelBody>
				</InspectorControls>
				<section
					className="hero hero-section"
					style={{ backgroundImage: "url(" + attributes.imageUrl + ")" }}
				>
					<div class="hero-section__wrap hero-section__wrap--dashboard">
						<InnerBlocks/>
					</div>
					<a href='#' className="hero-section__anchor">
						<svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="26" cy="26" r="25" transform="rotate(-180 26 26)" stroke="white"
									stroke-width="2"/>
							<path d="M14 21L26 32L38 21" stroke="white" stroke-width="3" stroke-linecap="round"
								  stroke-linejoin="round"/>
						</svg>
					</a>
				</section>
			</Fragment>
		);
	},

	save: ({ attributes }) => {

		return (
			<section className="hero-section"
					 style={{ background: `linear-gradient(88.81deg, rgba(19, 31, 94, 0.8) 30.98%, rgba(19, 31, 94, 0) 91.74%, rgba(19, 31, 94, 0) 91.74%), no-repeat center/cover url(${attributes.imageUrl}`
					 }}
			>
				<div class="hero-section__wrap">
					<InnerBlocks.Content />
				</div>
				<a href='#bottom-hero' class="hero-section__anchor">
					<svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="26" cy="26" r="25" transform="rotate(-180 26 26)" stroke="white" stroke-width="2"/>
						<path d="M14 21L26 32L38 21" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
				<div id="bottom-hero"/>
			</section>
		);
	},
});
