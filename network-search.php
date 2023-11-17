<?php
/**
 * Search results page
 * Template Name: Newtork Search
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$search_query = ! empty( $_GET[ 'q' ] ) ? $_GET[ 'q' ] : '';
$page_url = get_permalink();

$context          = Timber::context();
$context['title'] = 'Search results for ' . $search_query;
$context['posts'] = new Timber\PostQuery();

$myArray = [];
// $search_query = get_search_query();
$query_arg = 'current_page';
$current_page = ( isset( $_GET[ $query_arg ] ) && $_GET[ $query_arg ] ) ? absint( $_GET[ $query_arg ] ) : 1;

$args = array(
	's' => $search_query, // the search query is here
  'paged' => $current_page
);

$query_search = new Network_Query( $args );

if( $query_search->have_posts() ) :

	while( $query_search->have_posts() ) : $query_search->the_post();
    switch_to_blog( $query_search->post->BLOG_ID );

    array_push($myArray, array(
      'post_custom_thumbnail_desktop' => get_the_post_thumbnail_url($query_search->post->ID, 'Collage_rectangle'),
      'post_custom_thumbnail_mobile' => get_the_post_thumbnail_url($query_search->post->ID, 'Square_mobile'),
      'post_date'  => $query_search->post->post_date,
      'post_title' => $query_search->post->post_title,
      'post_excerpt'   => get_the_excerpt($query_search->post->ID),
      'post_permalink'  => get_permalink($query_search->post->ID)
    ));

    restore_current_blog();

	endwhile;

  // if( $query_search->max_num_pages > 1 ) {
	// 	echo paginate_links(
	// 		array(
	// 			'total' => $query_search->max_num_pages,
	// 			'current' => $current_page,
	// 			'base' => $page_url . '%_%',
	// 			'format' => '?' . $query_arg . '=%#%'
	// 		)
	// 	);
	// }

endif;

$context['search_page_num'] = $current_page;
$context['search_query'] = $search_query;
$context['max_num_pages'] = $query_search->max_num_pages;
$context['posts'] = $myArray;

Timber::render( $templates, $context );
