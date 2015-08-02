<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$context['wp_title'] .= ' - ' . $post->title();
$context['comment_form'] = TimberHelper::get_comment_form();

ob_start();
dynamic_sidebar('home_right_1');
$context['lewy_widget_area'] = ob_get_contents();
ob_end_clean();

ob_start();
	dynamic_sidebar('home_top_1');
	$context['gorny_widget_area'] = ob_get_contents();
	ob_end_clean();

		ob_start();
		dynamic_sidebar('tip_sidebar');
		$context['tip_widget_area'] = ob_get_contents();
		ob_end_clean();

if (post_password_required($post->ID)){
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}


