<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<base href="<?php echo get_bloginfo('url'); ?>">
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/css/jquery-ui-1.9.1.custom.css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

<?php
// Analytics Split-slider experiment
if (is_home() || is_front_page()){ ?>
	<!-- Google Analytics Content Experiment code -->
	<script>function utmx_section(){}function utmx(){}(function(){var
	k='50148153-0',d=document,l=d.location,c=d.cookie;
	if(l.search.indexOf('utm_expid='+k)>0)return;
	function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
	indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
	length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
	'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
	'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
	'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
	valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
	'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
	</script><script>utmx('url','A/B');</script>
	<!-- End of Google Analytics Content Experiment code -->
<?php } ?>

</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">

	<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>

	<div id="top">
		<nav class="col-full" role="navigation">
			<div class="top-nav-brand">
				<span><?php echo dlvs_translate("A part of"); ?></span>
				<img class="topbar-logo" src="<?php echo get_template_directory_uri(); ?>/images/dlvs/logo-topbar-white.png" />
				<span><?php echo dlvs_translate("European LifeCare Group"); ?></span>
			</div>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
		</nav>
	</div><!-- /#top -->

    <?php } ?>

	<header id="header">

		<div class="col-full">

		<?php
		    $logo = get_template_directory_uri() . '/images/logo.png';
		    if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
		?>
		<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
		    <a id="logo" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>">
		    	<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
		    </a>
	    <?php } ?>

	    <hgroup>

			<h1 class="site-title"><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<h3 class="nav-toggle"><a href="#navigation"><?php _e('Navigation', 'woothemes'); ?></a></h3>

		</hgroup>

		<?php if ( isset( $woo_options['woo_ad_top'] ) && $woo_options['woo_ad_top'] == 'true' ) { ?>
        <div id="topad">
			<?php
				if ( isset( $woo_options['woo_ad_top_adsense'] ) && $woo_options['woo_ad_top_adsense'] != '' ) {
					echo stripslashes( $woo_options['woo_ad_top_adsense'] );
				} else {
					if ( isset( $woo_options['woo_ad_top_url'] ) && isset( $woo_options['woo_ad_top_image'] ) )
			?>
				<a href="<?php echo $woo_options['woo_ad_top_url']; ?>"><img src="<?php echo $woo_options['woo_ad_top_image']; ?>" width="468" height="60" alt="advert" /></a>
			<?php } ?>
		</div><!-- /#topad -->
        <?php } ?>

		<?php if ( isset( $woo_options['woo_header_search'] ) && $woo_options['woo_header_search'] == 'true' ) { ?>
		<div class="search_main fix">
		    <form method="get" class="searchform" action="<?php echo home_url( '/' ); ?>" >
		        <input type="text" class="field s" name="s" value="<?php esc_attr_e( 'Search…', 'woothemes' ); ?>" onfocus="if ( this.value == '<?php esc_attr_e( 'Search…', 'woothemes' ); ?>' ) { this.value = ''; }" onblur="if ( this.value == '' ) { this.value = '<?php esc_attr_e( 'Search…', 'woothemes' ); ?>'; }" />
		        <input type="image" src="<?php echo get_template_directory_uri(); ?>/images/ico-search.png" class="search-submit" name="submit" alt="Submit" />
		    </form>
		</div><!--/.search_main-->
		<?php } ?>

		<ul class="header-widget-area">
			<?php woo_sidebar( 'header' ); ?>
		</ul>

   		<img src="<?php echo get_template_directory_uri(); ?>/images/dlvs/header-arrowaction.png" class="header-arrowaction" />

		</div><!-- /.col-full -->

	</header><!-- /#header -->

	<nav id="navigation" role="navigation">
		<div class="col-full">
			<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
		    <ul id="main-nav" class="nav fl">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
		    <?php } ?>

		    <ul id="side-nav" class="side-nav nav fl">
		    	<li class="">
		    		<span><?php echo dlvs_translate("Need help? Call us on weekdays from 9am-5pm"); ?></span>
		    	</li>
		    </ul>
		</div>
	</nav><!-- /#navigation -->
