<?php

function funkcja_dodajaca_widgety() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="rounded">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'funkcja_dodajaca_widgety' );

function funkcja_dodajaca_widgety_next() {

	register_sidebar ( array(
		'name'          => 'Home top sidebar',
		'id'            => 'home_top_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="rounded">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'funkcja_dodajaca_widgety_next' );

function funkcja_dodajaca_widgety_third() {

	register_sidebar ( array(
		'name'          => 'Third sidebar',
		'id'            => 'tip_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="tip">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'funkcja_dodajaca_widgety_third' );

	if (!class_exists('Timber')){
		add_action( 'admin_notices', function(){
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
		});
		return;
	}

	class StarterSite extends TimberSite {

		function __construct(){
			add_theme_support('post-formats');
			add_theme_support('post-thumbnails');
			add_theme_support('menus');
			add_filter('timber_context', array($this, 'add_to_context'));
			add_filter('get_twig', array($this, 'add_to_twig'));
			add_action('init', array($this, 'register_post_types'));
			add_action('init', array($this, 'register_taxonomies'));
			parent::__construct();
		}

		function register_post_types(){
			//this is where you can register custom post types
		}

		function register_taxonomies(){
			//this is where you can register custom taxonomies
		}

		function add_to_context($context){
			$context['foo'] = 'bar';
			$context['stuff'] = 'I am a value set in your functions.php file';
			$context['notes'] = 'These values are available everytime you call Timber::get_context();';
			$context['menu'] = new TimberMenu();
			$context['site'] = $this;
			return $context;
		}

		function add_to_twig($twig){
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
			return $twig;
		}

	}

	new StarterSite();

	function myfoo($text){
    	$text .= ' bar!';
    	return $text;
	}
	
	if ( !function_exists(‘register_sidebars’) )

return;