<?php /* Template Name: Malaria */ ?>
<?php get_header(); ?>

<div id="content">
	<div class="page col-full">
		<section id="main" class="col-left">

			<?php
				echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/"><div class="button-book-title">Book your vaccination</div><img src="' . get_template_directory_uri() . '/img/icon-rightarrow-white.png" class="button-book-icon" /></a>';
			?>

			<header><h1><?php the_title(); ?></h1></header>
			<?php echo the_content(); ?>

		</section>
		<?php sidebar(true, true, false); ?>

	</div>
</div>

<?php get_footer(); ?>
