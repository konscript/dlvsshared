<?php /* Template Name: Vaccination recommendations */ ?>
<?php get_header(); ?>
<?php
$args = array(
	'post_type'	=>'region',
	'title_li'	=> '&nbsp;',
	'echo'		=> false,
);
//$sidebar_button = '<a class="button-book" href="'.get_bloginfo("wpurl").'/booking/"><div class="button-book-title">' . dlvs_translate("Book vaccination") . '</div></a>';
$sidebar_menu = wp_list_pages( $args ); ?>

<div id="content">
	<div class="page col-full">
		<section id="main" class="col-left">

			<header><h1><?php the_title(); ?></h1></header>
			<?php while ( have_posts() ) { the_post(); $count++;
				the_content();
			}?>
			<div id="map-wrapper">

				<div class="map-form-container">
					<form method="GET" class="map-form" action="<?php bloginfo('wpurl'); ?>">
					  <select name="Country" id="country-selector">
						<option value="" selected="selected"><?php echo dlvs_translate("Choose country"); ?></option>
						<?php $countries = getCountries(); ?>
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
					<a href="<?php bloginfo('wpurl'); ?>/multiple-countries/" class="map-text"><?php echo dlvs_translate("or try the Trekkingguide if you're visiting multiple countries"); ?></a>
				</div>

				 <div id="map-continents">
				 <ul class="continents">
				  <li class="c1"><a href="<?php bloginfo('wpurl'); ?>/region/africa"><?php echo dlvs_translate("Africa"); ?></a></li>
				  <li class="c2"><a href="<?php bloginfo('wpurl'); ?>/region/asia"><?php echo dlvs_translate("Asia"); ?></a></li>
				  <li class="c3"><a href="<?php bloginfo('wpurl'); ?>/region/oceania"><?php echo dlvs_translate("Oceania"); ?></a></li>
				  <li class="c4"><a href="<?php bloginfo('wpurl'); ?>/region/europe"><?php echo dlvs_translate("Europe"); ?></a></li>
				  <li class="c5"><a href="<?php bloginfo('wpurl'); ?>/region/north-america"><?php echo dlvs_translate("North America"); ?></a></li>
				  <li class="c6"><a href="<?php bloginfo('wpurl'); ?>/region/south-america"><?php echo dlvs_translate("South America"); ?></a></li>
				 </ul>
				</div>

			</div>
		</section>
		<?php sidebar($sidebar_menu, true, false); ?>
	</div>
</div>

<script type="text/javascript">
jQuery.noConflict();
(function($){
	$(document).ready(function() {
		$('#map-continents').cssMap({'size' : 540});
	});
})(jQuery);

</script>


<?php wp_enqueue_script('jquery.cssmap.js', get_template_directory_uri() . '/includes/js/dlvs/jquery.cssmap.js' );?>
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo get_template_directory_uri(); ?>/includes/css/map-continents/cssmap-continents.css" />


<?php get_footer(); ?>
