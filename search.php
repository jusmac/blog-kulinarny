<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.1
 */


	$templates = array('search.twig', 'archive.twig', 'index.twig');
	$context = Timber::get_context();

	$context['title'] = 'Search results for '. get_search_query();
	$context['posts'] = Timber::get_posts();
	
	ob_start();
dynamic_sidebar('home_right_1');
$context['lewy_widget_area'] = ob_get_contents();
ob_end_clean();

	Timber::render($templates, $context);
