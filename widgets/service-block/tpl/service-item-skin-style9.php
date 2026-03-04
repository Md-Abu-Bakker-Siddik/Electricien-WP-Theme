<!-- Service Block Style8-->
<?php
$service_item['settings'] = $settings;
$service_item['title_tag'] = $title_tag;
$service_item['subtitle_tag'] = $subtitle_tag;
$feature_link = $service_item['feature_link'];
$count = $service_item['count'];
$target = ( $feature_link && $feature_link['is_external'] ) ? ' target="_blank"' : '';
$url = ( $feature_link && $feature_link['url'] ) ? $feature_link['url'] : '';
?>
<div class="service-item service-block-style9">
  <div class="inner-box">
    <?php mascot_core_electricien_get_shortcode_template_part( 'icon-type', $service_item['icon_type'], 'service-block/tpl', $service_item, false );?>
    <?php mascot_core_electricien_get_shortcode_template_part( 'part-title', null, 'service-block/tpl', $service_item, false );?>
    <?php mascot_core_electricien_get_shortcode_template_part( 'part-content', null, 'service-block/tpl', $service_item, false );?>
    <?php if ( $show_view_details_button == 'yes' ) : ?>
      <a href="<?php echo esc_url( $feature_link['url'] );?>" class="read-more"> <?php echo esc_html( $settings['view_details_button_text']  ); ?> <i class="fa fa-long-arrow-alt-right"></i></a>
    <?php endif; ?>
  </div>
</div>