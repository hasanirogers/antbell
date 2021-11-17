// Reference: https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components
// Reference: https://www.youtube.com/playlist?list=PLriKzYyLb28lHhftzU7Z_DJ32mvLy4KKH

const { registerBlockType } = window.wp.blocks;
const { RichText, InspectorControls, ColorPalette, MediaUpload, URLInput, InnerBlocks } = window.wp.blockEditor;
const { PanelBody, IconButton, TextControl } = window.wp.components;

const ALLOWED_BLOCKS = ['core'];

registerBlockType('pgs/page-background', {
  title: 'Page Background',
  description: 'Displays a Background for a page.',
  icon: 'format-image',
  category: 'design',

  // custom attributes
  attributes: {
    height: {
      type: 'string',
      default: 'auto'
    },

    overlayColor: {
      type: 'string',
      default: '#3e3f4c'
    },
    overlayValue: {
      type: 'string',
      default: '0.8'
    },
    backgroundImage: {
      type: 'string',
      default: null
    },
  },

  edit({ attributes, setAttributes }) {
    const {
        height,
        overlayColor,
        overlayValue,
        backgroundImage,
    } = attributes;

    const template = [
      [ 'core/heading', { placeholder: 'Add a heading.' } ],
      [ 'core/paragraph', { placeholder: 'Enter a some descriptive text.' } ]
    ];

    const backgroundValue = backgroundImage ? `url(${backgroundImage})` : 'none';

    // custom functions
    const onHeightChange = (newHeight) => {
      setAttributes({ height: newHeight })
    }

    const onOverlayColorChange = (newOverlayColor) => {
      setAttributes({ overlayColor: newOverlayColor })
    }

    const onOverlayValueChange = (newOverlayValue) => {
      setAttributes({ overlayValue: newOverlayValue })
    }

    const onSelectImage = (newImage) => {
      setAttributes({ backgroundImage: newImage.sizes.full.url });
    }

    return ([
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={ 'Background Settings' }>
          <TextControl
            label="Height"
            value={ height }
            onChange={ onHeightChange }
          />
          <p><strong>Select a Background Image:</strong></p>
          <MediaUpload
            onSelect={ onSelectImage }
            type="image"
            value={ backgroundImage }
            render={ ( { open } ) => (
              <IconButton
                className="editor-media-placeholder__button is-button is-default is-large"
                icon="upload"
                onClick={ open }>
                Background Image
              </IconButton>
            )}
          />
        </PanelBody>
        <PanelBody title={ 'Overlay Settings' }>
          <TextControl
            label="Overlay Value"
            value={ overlayValue }
            onChange={ onOverlayValueChange }
          />
          <p><strong>Overlay Color:</strong></p>
          <ColorPalette value={ overlayColor } onChange={ onOverlayColorChange } />
        </PanelBody>
      </InspectorControls>,
      <div className={`page-background`} style={{ height, backgroundImage: backgroundValue }}>
        <div class="page-background__container">
          <InnerBlocks template={ template } templateLock={ false } />
        </div>
        <div class="page-background__overlay" style={{ backgroundColor: overlayColor, opacity: overlayValue }}></div>
      </div>
    ]);
  },

  save({ attributes }) {
    const {
        height,
        overlayColor,
        overlayValue,
        backgroundImage,
    } = attributes;

    const backgroundValue = backgroundImage ? `url(${backgroundImage})` : 'none';

    return (
      <div className={`page-background`} style={{ height, backgroundImage: backgroundValue }}>
        <div class="page-background__container">
          <InnerBlocks.Content />
        </div>
        <div class="page-background__overlay" style={{ backgroundColor: overlayColor, opacity: overlayValue }}></div>
      </div>
    );
  }
});
