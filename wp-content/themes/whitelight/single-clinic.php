<?php get_header(); ?>
<?php
// Sidebar menu
$args = array(
  'post_type'	=>'clinic',
  'title_li'	=> '&nbsp;',
  'echo'			=> false,
);
$sidebar_menu = wp_list_pages( $args );

$clinic = basename(get_permalink());

// If the site uses xmedicus, book button should link directly to
if(get_field('xmedicus_id')){
	$sidebar_button = '<a class="button-book" style="margin-bottom:5px" href="' . get_bloginfo('wpurl') . '/booking/clinic/' . get_field('xmedicus_id') . '"><div class="button-book-title"> ' . dlvs_translate("Book vaccination") . '</div><img src="' . get_template_directory_uri() . '/img/icon-rightarrow-white.png" class="button-book-icon" /></a>';
} else if (get_field("booking_url")) {
	$sidebar_button = '<a class="button-book" style="margin-bottom:5px" href="' . get_bloginfo('wpurl') . '/booking/?clinic_param=' . $clinic . '"><div class="button-book-title"> ' . dlvs_translate("Book vaccination") . '</div><img src="' . get_template_directory_uri() . '/img/icon-rightarrow-white.png" class="button-book-icon" /></a>';
} else {
	$sidebar_button = '<a class="button-book button-alternate" style="margin-bottom:5px" href="' . get_permalink() . '"><div class="button-book-title">' . dlvs_translate("Call to book") . '<br />'.dlvs_translate("01462 459595").'</div><img src="' . get_template_directory_uri() . '/img/icon-phone-white.png" class="button-book-icon" /></a>';
}
?>

<div id="content">
	<div class="page col-full">

		<section id="main" class="col-left">

			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<div class="post clinic">

					<header><h1><?php the_title(); ?></h1></header>

					<?php
					$clinic = basename(get_permalink());
					//echo get_the_ID();
					//echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/clinic/' . $clinic . '"><div class="button-book-title">Bestil vaccination</div></a>';
					?>

					<div class="post-content">
						<?php
						// some text about the clinic
						echo the_content();
						?>
						<div class="contact">
							<p class="header"></p>
							<p class="address"><?php the_field('address'); ?><br /><?php the_field('city'); ?></p>
							<p class="telephone"><?php echo dlvs_translate("Phone"); ?>: <?php the_field('phone_number'); ?></p>
						</div>

						<?php if(dlvssite() == "sikkerrejse") { ?>
							<div class="opening_hours">
								<strong><?php echo dlvs_translate("Opening hours"); ?>:</strong>
								<br /><br />
								<span>Tilpasses løbende, se booking-siden for nærmere information.</span>
							</div>
						<?php } else { ?>
							<?php $weekdays = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday"); ?>
							<div class="opening_hours">
								<strong><?php echo dlvs_translate("Opening hours"); ?>:</strong>
								<br /><br />
								<table class="zebra">
									<?php	foreach($weekdays as $weekday): ?>
										<?php
										$hours = get_field($weekday);
										if($hours != ""): ?>
											<tr><td><?php echo ucfirst($weekday); ?></td><td><?php echo $hours; ?></td></tr>
										<?php	endif; ?>
									<?php	endforeach; ?>
								</table>
							</div>
						<?php } ?>

						<!--- <div class="gmap"><?php the_field('map'); ?></div> -->
						<br />
						<strong><?php echo dlvs_translate("Clinics location"); ?>:</strong>
						<br /><br />

						<?php
							$link_address = str_replace("\n", " ", strip_tags(get_field('address')));
							$link_city = str_replace("\n", "", strip_tags(get_field('city')));
						?>

						<iframe width="709" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?q=<?php echo urlencode($link_address) . " " . urlencode($link_city); ?>&ie=UTF8&output=embed"></iframe>
						<br />
						<a href="https://maps.google.com/?q=<?php echo $link_address.$link_city; ?>" target="_blank"><?php echo dlvs_translate("Show full-screen map"); ?></a>
						<br />
						<?php if(dlvssite() == "sikkerrejse") { ?>
							<a href="http://www.rejseplanen.dk/bin/query.exe/mn?ZADR=1&Z=<?php echo $link_address.$link_city; ?>" target="_blank">Tilgang med offentlig transport</a>
						<?php } ?>
					</div>
				</div><!--#end post-->
			<?php endwhile; endif; ?>

		</section>

		<?php sidebar($sidebar_button.$sidebar_menu, false, false); ?>
	</div>
</div>

<?php get_footer(); ?>
