<?php get_header(); ?>

<?php


if (dlvssite() == "sikkerrejse") {
	$sidebar_back = '<a href="'. get_bloginfo("wpurl") . '/vaccinationsanbefaling/" class="country-back-button">Tilbage til landeoversigten</a>';
} else {
	$sidebar_back = '<a href="'. get_bloginfo("wpurl") . '/recommended-vaccinations/" class="country-back-button">Go back to the map</a>';
}
$destination = urlencode(the_title('', '', false));
$sidebar_button = '<a class="button-book" href="'.get_bloginfo("wpurl").'/booking/destination/' . $destination . '"><div class="button-book-title">' . dlvs_translate("Book vaccination") . '</div><img src="' . get_template_directory_uri() . '/img/icon-rightarrow-white.png" class="button-book-icon" /></a>';


//$sidebar_country_meta = '<h3>Lande fakta</h3>';
if(get_field('flag')) {
	$sidebar_country_meta = '
	<div class="country-flag">
		<img src="'.get_field("flag").'" />
	</div>';
}

$sidebar_country_meta .=
	'<table class="country-meta">
		<tbody>
		<tr>
			<td><strong>'.dlvs_translate('Capital').':</strong></td>
			<td>'.get_field('capital').'</td>
		</tr>
		<tr>
			<td><strong>'.dlvs_translate('Population').':</strong></td>
			<td>'.get_field('population').'</td>
		</tr>
		<tr>
			<td colspan="2">
				'.get_field('embassy_info').'
			</td>
		</tr>
		<tr>
			<td colspan="2">
				'.$sidebar_country_meta_links.'
			</td>
		</tr>';

$sidebar_country_meta .= '
		</tbody>
	</table>';

?>

<div id="content">
	<div class="page col-full">
		<section id="main" class="col-left">

			<?php if (have_posts()): while (have_posts()): the_post(); ?>
			    <div class="post country col-full">
					<header><h1><?php the_title(); ?></h1></header>

					<?php
						$destination = urlencode(the_title('', '', false));
						$book_button = '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/destination/' . $destination . '"><div class="button-book-title">' . dlvs_translate("Book vaccination") . '</div></a>';
						//echo $book_button;
					?>

					<div class="post-content">

						<div class="the-content">
							<?php if($_GET["gclid"]) { ?>
								<div class="dlvs-general-info">
									<?php dynamic_sidebar( 'vaccination-information' ); ?>
								</div>
							<?php } ?>
							<?php echo get_field('extra_country_info'); ?>
						</div>

					<?php

						// vaccinations for groups
						$vaccinations_groups = array();

						$vaccinations_groups[1] = get_field('group_1');
						$vaccinations_groups[2] = get_field('group_2');
						$vaccinations_groups[3] = get_field('group_3');
						$vaccinations_groups[4] = get_field('group_4');
						$vaccinations_groups[5] = get_field('group_5');

						// output vaccination table
						vaccination_groups($vaccinations_groups);
					?>

					<?php if(dlvssite() == "flufighters") { ?>
						<br />
						<div class="disclaimer">
							The vaccination list on this page is for general guidance, and it may vary from your actual needs. Therefore, when you book time for vaccinations or malaria counseling, you will receive a risk assessment form in your e-mail with questions about:
							<ul>
								<li>Your itinerary (“where are you going?”)</li>
								<li>The timing of your journey (“when are you going? Do you have time to complete the recommended course?)</li>
								<li>The nature of your journey (“e.g. backpacking or 5 star hotel?”)</li>
								<li>Your previous medical history</li>
								<li>Consideration of any full or partially completed courses of previous vaccines</li>
							</ul>
							Bring the form to the Travel Nurse upon arrival at our clinic and she will make sure you are immunized and counseled before your travels.
						</div>
					<?php } ?>

					<div class="meta-boxes">
					<?php if (get_field('updated_malaria_map')) { ?>
						<div class="malaria-box box">
							<a href="<?php echo get_field('updated_malaria_map'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo("template_url"); ?>/images/dlvs/country-malaria-thumbnail.jpg" />
							</a>
							<div class="text">
								<a href="<?php echo get_field('updated_malaria_map'); ?>" target="_blank"><?php echo dlvs_translate('Updated Malaria Map'); ?></a><br />
								<span><?php echo dlvs_translate('See a map of malaria risk for this country'); ?></span>
							</div>
						</div>
					<?php } ?>

					<?php if (get_field('latest_disease_surveillance')) { ?>
						<div class="disease-box box">
							<a href="<?php echo get_field('latest_disease_surveillance'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo("template_url"); ?>/images/dlvs/country-disease-thumbnail.jpg" />
							</a>
							<div class="text">
								<a href="<?php echo get_field('latest_disease_surveillance'); ?>" target="_blank"><?php echo dlvs_translate('Latest Disease Surveillance'); ?></a><br />
								<span><?php echo dlvs_translate('Information on outbreaks from NaTHNaC'); ?></span>
							</div>
						</div>
					<?php } ?>
					</div>

					<?php /*
					$country_id = get_the_ID();
					$faqs = getFaqsByCountry($country_id);

					<div class="accordion"> -->
						foreach($faqs as $id => $faq):
							echo slidedown($faq["post_title"], $faq["post_content"], $id);
						endforeach;
					</div>
					*/ ?>

					<div class="dlvs-disclaimer-info">
						<?php dynamic_sidebar( 'vaccination-disclaimer' ); ?>
					</div>

                    <div id="legend">
                        <h3><?php echo dlvs_translate("Explanation of symbols"); ?></h3>
                        <table>
                            <tr><td class="symbol"><img src="<?php echo get_bloginfo("template_url"); ?>/img/checkmark.png" title="<?php echo dlvs_translate("Recommended"); ?>"/></td><td><?php echo dlvs_translate("Recommended"); ?></td></tr>
                            <tr><td class="symbol"><img src="<?php echo get_bloginfo("template_url"); ?>/img/plusmark.png" title="<?php echo dlvs_translate("Should be considered"); ?>"/></td><td><?php echo dlvs_translate("Should be considered"); ?></td></tr>
                        </table>
                    </div>

			    </div><!--#end post-->
	        <?php endwhile; endif; ?>
		</section>

		<?php sidebar($sidebar_back . $sidebar_button, false, $sidebar_country_meta); ?>

	</div>
</div>

<?php get_footer(); ?>
