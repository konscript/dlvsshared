<?php get_header(); ?>
<?php
$args = array(
	'post_type'	=>'region',
	'title_li'	=> '&nbsp;',
	'echo'		=> false,
);
$sidebar_menu = wp_list_pages( $args ); ?>

<div id="content">
	<div class="page col-full">
		<section id="main" class="col-left">

			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<div class="post region">
					<header><h1><?php the_title(); ?></h1></header>
					<div class="post-content">

						<?php
						$region_serialized = get_post_custom_values('countries');

						try {
							$region = unserialize($region_serialized[0]);
							if($region === false){
						        throw new Exception('Not a serialized array');
							}
						} catch (Exception $e) {
							$region = $region_serialized[0];
						}
						$countries = getCountriesArray($region);
						?>

						<form method="GET" class="map-form" action="<?php bloginfo('wpurl'); ?>">
						  <select name="Country" id="country-selector">
					    <option value="" selected="selected"><?php echo dlvs_translate("Choose country"); ?></option>
							<?php foreach($countries as $country): ?>
								<?php
									$country_name = $country->post_title;
									$country_slug = get_permalink($country->ID);
									$country_id = $country->ID;
								?>
							    <option value="<?= $country_slug; ?>"><?=$country_name; ?></option>
							<?php endforeach; ?>
						  </select>
						  <input type="Submit" value="Find">
						</form>

						&nbsp;&nbsp;<a href="<?php bloginfo('wpurl'); ?>/multiple-countries/" class="map-text" style="display: inline"><?php echo dlvs_translate("or try the Trekkingguide if you're visiting multiple countries"); ?></a>

						<!-- <img class="region-map" src="<?php bloginfo('template_directory'); ?>/img/continents-<?php echo basename(get_permalink()); ?>.png" alt="<?php echo basename(get_permalink()); ?>" /> -->
		      			<br /><br />
						<div class="country-wrapper">
						<?php

						// output countries in region
						foreach($countries as $country):
							if(get_field('flag', $country->ID)) { ?>
							<a href="<?php echo get_permalink( $country->ID ); ?>" class="country" title="<?php echo $country->post_title; ?>">
								<img src="<?php the_field('flag', $country->ID); ?>" alt="<?php echo $country->post_title; ?>" />
								<span><?php echo $country->post_title; ?></span>
							</a>
						<?php } endforeach; ?>
						</div>

					</div>
				</div><!--#end post-->
			<?php endwhile; endif; ?>
		</section>

		<?php sidebar($sidebar_menu, false, false); ?>

	</div>
</div>

<?php get_footer(); ?>
