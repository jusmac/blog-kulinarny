<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.1
 */

	if (!class_exists('Timber')){
		echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
		return;
	}
	$context = Timber::get_context();
	$context['posts'] = Timber::get_posts();
	$context['foo'] = 'bar';
	$templates = array('index.twig');
	if (is_home()){
		array_unshift($templates, 'home.twig');
	}
	
	ob_start();
	dynamic_sidebar('home_right_1');
	$context['lewy_widget_area'] = ob_get_contents();
	ob_end_clean();

	ob_start();
	dynamic_sidebar('home_top_1');
	$context['gorny_widget_area'] = ob_get_contents();
	ob_end_clean();
		
	Timber::render($templates, $context);


