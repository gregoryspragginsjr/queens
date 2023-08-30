<?php
/**
 * View: List Single Event Venue
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/venue.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 6.2.0
 * @since 6.2.0 Added the `tec_events_view_venue_after_address` action.
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 * @var string  $slug  The slug of the view.
 *
 * @see tribe_get_event() For the format of the event object.
 */

if ( ! $event->venues->count() ) {
	return;
}

$separator            = esc_html_x( ', ', 'Address separator', 'the-events-calendar' );
$venue                = $event->venues[0];
$append_after_address = array_filter( array_map( 'trim', [ $venue->state_province, $venue->state, $venue->province ] ) );
$address              = $venue->address . ( $venue->address && ( $append_after_address || $venue->city ) ? $separator : '' );
?>
<address class="tribe-events-calendar-list__event-venue tribe-common-b2">
	<span class="icon-text">
    <svg class="fill-current icon icon--sm" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24">
      <path d="M17.94 4.86a8.4 8.4 0 0 1 0 11.88L12 22.68l-5.94-5.94A8.4 8.4 0 1 1 17.94 4.86ZM12 13.2a2.4 2.4 0 1 0 0-4.8 2.4 2.4 0 0 0 0 4.8Z" style="fill-rule:evenodd;clip-rule:evenodd;" />
    </svg>
	
		<span class="tribe-events-calendar-list__event-venue-title tribe-common-b2--bold">
			<?php echo wp_kses_post( $venue->post_title ); ?>
		</span>
	</span>

	<?php
	/**
	 * Fires after the full venue has been displayed.
	 *
	 * @since 6.2.0
	 *
	 * @param WP_Post $event Event post object.
	 * @param string  $slug  Slug of the view.
	 */
	do_action( 'tec_events_view_venue_after_address', $event, $slug );
	?>
</address>
