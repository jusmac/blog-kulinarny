<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
	
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

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);