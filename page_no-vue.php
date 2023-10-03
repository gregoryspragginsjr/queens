<?php
/**
 * The template for displaying pages with sidebars.
 *
 * Template Name: Page for Embeds
 * 
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$template = 'page_no-vue.twig';


Timber::render( $template, $context );