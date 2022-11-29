<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus WordPress

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_style('style', get_template_directory_uri() .'/css/style.css', ['bootstrap'], true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
  wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');


function create_post_type() {	
	register_post_type('services', [
		'labels' => [
			'name' => __('Services'),
			'singular_name' => __('Services')
		],
    'supports' => ['title', 'editor', 'thumbnail'],
		'public' => true,
		'has_archive' => false,
  	'rewrite' => ['slug' => 'services'],
		'menu_icon' => 'dashicons-clipboard'
	]);
}
add_action('init', 'create_post_type');
