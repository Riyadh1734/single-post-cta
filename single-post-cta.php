<?php
/**
 * Plugin Name: Single Post CTA
 * Description: Adds sidebar (widget area) to single posts
 * Plugin URI: https://github.com/Riyadh1734/single-post-cta
 * Author: Riyadh Ahmed
 * Author URI: http://sajuahmed.epizy.com/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * text Domain: spc
 */

defined( 'ABSPATH' ) || exit;

// LOad stylesheet
 function spc_load_stylesheet() {
       if (apply_filters( 'spc_load_style', true ))
       if (is_single()) {
       wp_enqueue_style('spc_stylesheet', plugin_dir_url( __FILE__ ) .'spc-style.css' );
       }
 }
  //Uncomment the following line to disable stylesheet
 //add_filter('spc_load_style', __return_false );
 //Hook stylesheet
 add_action( 'wp_enqueue_scripts', 'spc_load_stylesheet' );

//Register a custom sidebar
 function spc_register_sidebar() {
       register_sidebar( array(
        'name'          => __( 'Single Post CTA', 'spc' ),
        'id'            => 'spc-sidebar',
        'description'   => __( 'Displays Widget area on single posts', 'spc' ),
        'before_widget' => '<div class="widget spc">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle spc-title">',
        'after_title'   => '</h2>',
    ) );

 }

//Hook sidebar
 add_action('widgets_init', 'spc_register_sidebar');

//Display sidebar
 function spc_display_sidebar( $content ){
       if (is_single()) {
       dynamic_sidebar('spc-sidebar');
       }
       return $content;
}
 add_filter('the_content', 'spc_display_sidebar' );