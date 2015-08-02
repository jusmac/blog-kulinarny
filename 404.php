<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

	$context = Timber::get_context();
	
	ob_start();
	dynamic_sidebar('home_right_1');
	$context['lewy_widget_area'] = ob_get_contents();
	ob_end_clean();

	Timber::render('404.twig', $context);