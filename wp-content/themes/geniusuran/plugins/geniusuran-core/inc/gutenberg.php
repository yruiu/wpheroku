<?php
function geniusuran_register_blocks(){
    if(!function_exists('register_block_type')){
        return;
    }
    wp_register_script('gc-about',  plugins_url('/blocks/js/gc-about.js', __FILE__), ['wp-block', 'wp-element', 'wp-editor'],'1.0');
    wp_register_style('gc-about-css',  plugins_url('/blocks/css/gc-about.css', __FILE__), [],'1.0');
    register_block_type('gcab/gc-about', ['style'=> 'gc-about-css','editor_script'=>'gc-about', 'editor_style'=>'gc-about-css']);
}
add_action('init', 'geniusuran_register_blocks');