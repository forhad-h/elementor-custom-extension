<?php
/**
 * Front-end of product gallery slider
 * @since 1.0.0
*/
$images_dir = PLUGIN_BASE_URL.'assets/images/';
global $product;

//$product = wc_get_product( 113 ); // get product with product id

$gallery_image_blocks = '';

if($product && count($product->get_gallery_image_ids())) {

  /**
    * Dynamic Gallery image blocks
    *
    * @since 1.0.0
    * @var markup gallery images markup
  */
  $gallery_image_ids = $product->get_gallery_image_ids();
  for($i = 0; $i < count($gallery_image_ids); $i++) {
    $img_url = wp_get_attachment_url($gallery_image_ids[$i]);

    $gallery_image_blocks .= <<<SINGLE_IMAGE_SECTION
      <div>
          <img data-u="image" src="{$img_url}" />
          <img data-u="thumb" src="{$img_url}" />
      </div>
SINGLE_IMAGE_SECTION;
  }

} else {

  /**
    * Dynamic Gallery image blocks
    *
    * @since 1.0.0
    * @var markup gallery images markup
  */

    $gallery_image_blocks = <<<DEFAULT_IMAGES
      <div>
          <img data-u="image" src="{$images_dir}/004.jpg" />
          <img data-u="thumb" src="{$images_dir}/004-s99x66.jpg" />
      </div>
      <div>
          <img data-u="image" src="{$images_dir}/005.jpg" />
          <img data-u="thumb" src="{$images_dir}/005-s99x66.jpg" />
      </div>
      <div>
          <img data-u="image" src="{$images_dir}/006.jpg" />
          <img data-u="thumb" src="{$images_dir}/006-s99x66.jpg" />
      </div>
      <div>
          <img data-u="image" src="{$images_dir}/007.jpg" />
          <img data-u="thumb" src="{$images_dir}/007-s99x66.jpg" />
      </div>
DEFAULT_IMAGES;

}





$slider_markup = <<<SLIDER_MARKUP
<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{$images_dir}/spin.svg" />
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:240px;width:720px;height:480px;overflow:hidden;">
        {$gallery_image_blocks}
        <a data-u="any" href="https://www.jssor.com" style="display:none">slider bootstrap</a>
    </div>
    <!-- Thumbnail Navigator -->
    <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;top:0px;width:240px;height:480px;background-color:#000;" data-autocenter="2" data-scale-left="0.75">
        <div data-u="slides">
            <div data-u="prototype" class="p" style="width:99px;height:66px;">
                <div data-u="thumbnailtemplate" class="t"></div>
                <svg viewbox="0 0 16000 16000" class="cv">
                    <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                    <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                    <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                </svg>
            </div>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:270px;" data-autocenter="2">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>
<!-- #endregion Jssor Slider End -->
SLIDER_MARKUP;

echo $slider_markup;
