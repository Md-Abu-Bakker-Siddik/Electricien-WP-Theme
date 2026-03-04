<?php $features_item['settings'] = $settings; ?>
<?php
$features_item['title_tag'] = $title_tag;
$features_item['subtitle_tag'] = $subtitle_tag;

$features_link = $features_item['features_link'];
$target = ( $features_link && $features_link['is_external'] ) ? ' target="_blank"' : '';
$url = ( $features_link && $features_link['url'] ) ? $features_link['url'] : '';
?>
<div class="features-block-style6">
  <div class="inner-box">
    <div class="bg-map"></div>
    <?php mascot_core_electricien_get_shortcode_template_part( 'icon-type', $features_item['icon_type'], 'features-block/tpl', $features_item, false );?>
    <div class="content-box">
      <?php mascot_core_electricien_get_shortcode_template_part( 'part-title', null, 'features-block/tpl', $features_item, false );?>
      <?php mascot_core_electricien_get_shortcode_template_part( 'part-content', null, 'features-block/tpl', $features_item, false );?>
      <a href="<?php echo esc_url( $url );?>" class="read-more"><i class="icon fa fa-long-arrow-right"></i></a>
    </div>
  </div>
</div>