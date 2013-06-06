<?php /* Template Name: Booking-YouCanBookMe */ ?>
<?php get_header(); ?>
<div id="content">
	<div class="page col-full">
		<section class="col-full template booking">
			<header><h1><?php the_title(); ?></h1></header>

			<?php
			// destination
			$clinic_param = urldecode($wp_query->query_vars['clinic_param']);
			$destination_param = urldecode($wp_query->query_vars['destination_param']);
			?>

			<?php $weekdays = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday"); ?>
			<iframe src="about:blank" frameborder="0" width="100%" height="1000" style="display:none"></iframe>
			<table class="zebra">
				<thead>
					<td>Clinic</td>
					<?php foreach($weekdays as $weekday): ?>
						<td class="weekday"><?php echo ucfirst($weekday); ?></td>
					<?php endforeach; ?>
					<td width="100">&nbsp;</td>
				</thead>
				<?php $clinics = getClinics(); ?>
				<?php foreach($clinics as $clinic): ?>
					<?php if($clinic_param === $clinic->post_name){
						$iframe_booking_url = get_field('booking_url', $clinic->ID);
					}
					?>

					<tr>
						<td><a href="<?php echo get_permalink($clinic->ID); ?>"><?php echo get_the_title($clinic->ID); ?></a><br /><?php the_field("address", $clinic->ID); ?></td>
						<?php foreach($weekdays as $weekday): ?>
							<td class="weekday"><?php the_field($weekday, $clinic->ID); ?></td>
						<?php endforeach; ?>
						<?php
							if (get_field("booking_url", $clinic->ID)){
								$button = '<a class="button-book iframe button-book-table" href="' . get_field('booking_url', $clinic->ID) . '"><div class="button-book-title">Book now</div><img src="' . get_template_directory_uri() . '/img/icon-rightarrow-white.png" class="button-book-icon" /></a>';
							}else{
								$button = '<a class="button-book button-book-table button-alternate" href="' . get_permalink($clinic->ID) . '"><div class="button-book-title">Call us</div><img src="' . get_template_directory_uri() . '/img/icon-phone-white.png" class="button-book-icon" /></a>';
							}
						?>
						<td><?php echo $button ?></td>
					</tr>
				<?php endforeach; ?>
			</table>

			<?php if($clinic_param !== ""): ?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
						loadBookingIframe("<?php echo $iframe_booking_url; ?>");
					});
				</script>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>

