<?php
/**
 * View: Default Template for Events
 *
 * @package TribeEventsCalendar
 *
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$context = Timber::get_context();
$context['tribe_markup'] = tribe( Template_Bootstrap::class )->get_view_html();

Timber::render( array( 'page-events.twig' ), $context );
