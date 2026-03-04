<?php
/**
 * The template for displaying Maintenance Mode Page
 *
 * This is the template that displays Maintenance Mode0 page by default.
 *
 */
add_filter( 'electricien_filter_show_header', 'electricien_return_false' );
add_filter( 'electricien_filter_show_footer', 'electricien_return_false' );

//change the page title
if( electricien_get_redux_option( 'maintenance-mode-settings-title' ) != '' ) {
	add_filter('pre_get_document_title', 'electricien_change_the_title');
	function electricien_change_the_title() {
		return electricien_get_redux_option( 'maintenance-mode-settings-title' );
	}
}

get_header();
?>

<?php
if ( mascot_core_electricien_plugin_installed() ) {
	mascot_core_electricien_get_maintenance_mode_parts();
}
?>

<?php get_footer();
