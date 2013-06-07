<?php
/**
 * Template Name: Index Split-slider
 */

get_header();

$settings = array(
    'featured' => 'false',
    'custom_intro_message' => 'true',
    'custom_intro_message_text' => '',
    'features_area' => 'true',
    'portfolio_area' => 'true',
    'blog_area' => 'false',
    'alt_blog_area' => 'false',
    'streamer_area' => 'false'
    );

$settings = woo_get_dynamic_values( $settings );
?>

    <div class="splitslider col-full">
        <?php
        // Featured Slider
        if ( !$paged && isset( $woo_options['woo_featured'] ) && $woo_options['woo_featured'] == 'true' ) {
            get_template_part ( 'includes/homepage-splitslider' );
        }
        ?>
    </div>

    <?php if ( !$paged && $settings['custom_intro_message'] == "true" ) { ?>
    <section id="intro">
        <div class="col-full">
            <h1><?php echo stripslashes( $settings['custom_intro_message_text'] ); ?></h1>
        </div>
    </section>
    <?php } ?>

    <div id="content">
        <div class="col-full">

        <?php
        if ( ! is_active_sidebar( 'homepage' ) ) {

            // Output the Features Area
            if ( !$paged && $settings['features_area'] == 'true' ) { get_template_part( 'includes/homepage-features-panel' ); }

            // Output the Portfolio Area
            if ( !$paged && $settings['portfolio_area'] == 'true' ) { get_template_part( 'includes/homepage-portfolio-panel' ); }

            // Output the Blog Area
            if ( $settings['alt_blog_area'] == 'true' ) { get_template_part( 'includes/homepage-blog-alt-panel' ); }

            // Output the Content Area
            if ( $settings['blog_area'] == 'true' ) { get_template_part( 'includes/homepage-blog-panel' ); }

            // DLVS: Output the streamer
            if ( $settings['streamer_area'] == 'true' ) { get_template_part( 'includes/homepage-streamer-panel' ); }

        } else {

            // Output the Widgetized Area
            dynamic_sidebar( 'homepage' );

        } // End If Statement
        ?>

        </div><!-- /.col-full -->
    </div><!-- /#content -->

<?php get_footer(); ?>