<?php
/**
 * The template for displaying Author Archive pages
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */
global $wp_query;

$data = Timber::get_context();
$data['posts'] = Timber::get_posts();
if (isset($wp_query->query_vars['author'])){
	$author = new TimberUser($wp_query->query_vars['author']);
	$data['author'] = $author;
	$data['title'] = 'Author Archives: ' . $author->name();
}

	ob_start();
	dynamic_sidebar('home_right_1');
	$data['lewy_widget_area'] = ob_get_contents();
	ob_end_clean();

Timber::render(array('author.twig', 'archive.twig'), $data);
