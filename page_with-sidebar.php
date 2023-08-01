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

Timber::render( $template, $context );