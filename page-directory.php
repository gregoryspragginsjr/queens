<?php
/**
 * The template for displaying pages with sidebars.
 *
 * Template Name: Directory Page
 * 
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

 $context = Timber::context();

 $timber_post     = new Timber\Post();
 $context['post'] = $timber_post;
 Timber::render( array( 'page-directory.twig', 'page.twig' ), $context );
