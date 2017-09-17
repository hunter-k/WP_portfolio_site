<?php
function create_post_type() {
  register_post_type( 'portfolio_item',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Projects' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-clipboard'
    )
  );
}
add_action( 'init', 'create_post_type' );
?>