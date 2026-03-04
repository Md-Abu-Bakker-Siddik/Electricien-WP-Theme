<?php

use MascotCoreElectricien\CPT\Projects\CPT_Projects;

if(!function_exists('electricien_get_projects')) {
	/**
	 * Function that Renders Project list HTML Codes
	 * @return HTML
	 */
	function electricien_get_projects( $container_type = 'container' ) {
		$settings = array();

		$settings['container_type'] = $container_type;

		$html = mascot_core_electricien_get_cpt_shortcode_template_part( 'projects-parts', null, 'projects/archive-tpl', $settings, true );
		echo $html;
	}
}

if ( ! function_exists( 'electricien_get_project_layout' ) ) {
	/**
	 * Returns Project Layout Type
	 *
	 */
	function electricien_get_project_layout() {
		$settings = array();

		$new_cpt_class = CPT_Projects::Instance();
		$settings['ptTaxKey'] = $new_cpt_class->ptTaxKey;

		$settings['holder_id'] = electricien_get_isotope_holder_ID('projects');

		$settings['layout_mode'] = electricien_get_redux_option( 'cpt-settings-projects-archive-layout-mode' );
		$settings['items_per_row'] = electricien_get_redux_option( 'cpt-settings-projects-archive-items-per-row' );
		$settings['gutter'] = electricien_get_redux_option( 'cpt-settings-projects-archive-gutter-size' );
		$settings['featured_image_size'] = electricien_get_redux_option( 'cpt-settings-projects-archive-featured-image-size' );
		$settings['title_tag'] = electricien_get_redux_option( 'cpt-settings-projects-archive-title-tag', 'h4' );
		$settings['settings'] = $settings;

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = mascot_core_electricien_get_cpt_shortcode_template_part( 'projects-grid', null, 'projects/archive-tpl/tpl', $settings, true );
		echo $html;
	}
}