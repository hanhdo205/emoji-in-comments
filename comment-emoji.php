<?php
/*
  Plugin Name: Emoji in comments
  Plugin URI: https://facebook.com/hanhdo205
  Description: Display emojis in WordPress comments
  Author: Nguyen Quoc Hanh
  Version: 1.0.0
  Author URI: 
*/
  
function emoji_load_plugin_textdomain() {
    load_plugin_textdomain('wp_emoji', FALSE, plugin_basename(dirname(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'emoji_load_plugin_textdomain');

function emoji_reg_scripts() {

  wp_register_style( 'emojione.sprites-css', plugin_dir_url( __FILE__) . 'css/emojione.sprites.css' );
  wp_enqueue_style( 'emojione.sprites-css' );
  wp_register_style( 'emojionearea.min-css', plugin_dir_url( __FILE__) . 'css/emojionearea.min.css' );
  wp_enqueue_style( 'emojionearea.min-css' );
  wp_register_style( 'emojione.min-css', plugin_dir_url( __FILE__) . 'css/emojione.min.css' );
  wp_enqueue_style( 'emojione.min-css' );

  wp_enqueue_script( 'emojionearea-script', plugin_dir_url( __FILE__) . 'js/emojionearea.min.js', array ( 'jquery' ), '25092019', true);
  wp_enqueue_script( 'emojione-script', plugin_dir_url( __FILE__) . 'js/emojione.min.js', array ( 'jquery' ), '25092019', true);
  wp_enqueue_script( 'emoji-script', plugin_dir_url( __FILE__) . 'js/main.js', array ( 'jquery' ), '25092019', true);
  wp_localize_script( 'emoji-script', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'emoji_reg_scripts');