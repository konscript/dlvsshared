<?php /* Template Name: Booking-Xmedicus */ ?>
<?php get_header(); ?>
<div id="content">
	<div class="page col-full">
		<section class="col-full template booking">
			<header><h1><?php the_title(); ?></h1></header>
			<?php while ( have_posts() ) { the_post(); $count++;
				the_content();
			}?>

			<?php
			// destination
			$clinic_param = urldecode($wp_query->query_vars['clinic_param']);

			debug($clinic_param);

			if($clinic_param){
				$clinic_query = "/booking?ou=" . $clinic_param . ".php";
			}else{
				$clinic_query = "";
			}

			?>

			<iframe src="http://tid.dlvs.dk<?php echo $clinic_query; ?>" frameborder="0" width="100%" height="1000"></iframe>

		</section>
	</div>
</div>

<?php get_footer(); ?>

