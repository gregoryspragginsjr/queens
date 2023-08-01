<?php
/**
 * The template for displaying pages with sidebars.
 *
 * Template Name: Page with Sidebar
 * 
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$template = 'page_with-sidebar.twig';

if ( $post->post_parent ) {
  $ancestors = get_post_ancestors( $post->ID );

  $ancestor_found = false;

  if ( ! $ancestor_found ) {
    $root   = count( $ancestors ) - 1;
    $parent = $ancestors[ $root ];
  }
} else {
  $parent = $post->ID;
}

$parent_map = array(
  'id'        => $parent,
  'title'     => get_the_title( $parent ),
  'permalink' => get_permalink( $parent ),
  'children'  => get_pages(
    array(
      'parent'      => $parent,
      'sort_column' => 'menu_order',
    )
  ),
);

$context['alpha_parent'] = $parent_map;

Timber::render( $template, $context );