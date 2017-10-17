<?php

class PostHelper {


  /**
   * Create a new post time
   * @param  string $single_name The post tipe's single name
   * @param  string $plural_name The post type's plural name
   * @param  string $slug        The post type slug
   * @param  array  $args        The post type attributes
   * 
   * @return void
   */
  public static function create( $single_name, $plural_name, $slug = '', $args = array() ) {

    $labels = array(
      'name'               => $single_name,
      'singular_name'      => $single_name,
      'menu_name'          => $single_name,
      'name_admin_bar'     => $single_name,
      'add_new'            => __( 'Add new', 'rise-framework' ),
      'add_new_item'       => __( 'Add new ', 'rise-framework' ) . $single_name ,
      'new_item'           => __( 'New ', 'rise-framework' ) . $single_name,
      'edit_item'          => __( 'Edit ', 'rise-framework' ) . $single_name,
      'view_item'          => __( 'See ', 'rise-framework' ) . $single_name,
      'all_items'          => __( 'All of ', 'rise-framework' ) . $plural_name,
      'search_items'       => __( 'Search ', 'rise-framework' ) . $plural_name,
      'parent_item_colon'  => $plural_name . __( '-Parent' ),
      'not_found'          => $plural_name . __( ' not found' ),
      'not_found_in_trash' => $plural_name . __( ' not found in the trash bin' ),
    );

    $args = array(
      'label'              => isset( $args['label'] )              ? $args['label'] : $labels['name'],
      'labels'             => isset( $args['labels'] )             ? $args['labels'] : $labels,
      'description'        => isset( $args['description'] )        ? $args['description'] : $single_name,
      'hierarchical'       => isset( $args['hierarchical'] )       ? $args['hierarchical'] : false,
      'public'             => isset( $args['public'] )             ? $args['public'] : true,       
      'publicly_queryable' => isset( $args['publicly_queryable'] ) ? $args['publicly_queryable'] : true,
      'show_ui'            => isset( $args['show_ui'] )            ? $args['show_ui'] : true,
      'show_in_menu'       => isset( $args['show_in_menu'] )       ? $args['show_in_menu'] : true,
      'query_var'          => isset( $args['query_var'] )          ? $args['query_var'] : true,  
      'rewrite'            => isset( $args['rewrite'] )            ? $args['rewrite'] : array( 'slug' => $slug ),
      'capability_type'    => isset( $args['capability_type'] )    ? $args['capability_type'] : 'post',
      'has_archive'        => isset( $args['has_archive'] )        ? $args['has_archive'] : true,
      'menu_position'      => isset( $args['menu_position'] )      ? $args['menu_position'] : 5,
      'taxonomies'         => isset( $args['taxonomies'] )         ? $args['taxonomies'] : array(),
      'supports'           => isset( $args['supports'] )           ? $args['supports'] : array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( $slug, $args );

    /**
     * @see https://codex.wordpress.org/Function_Reference/flush_rewrite_rules
     */
    flush_rewrite_rules();

  }
}