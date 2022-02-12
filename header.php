<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-logo">
		<a href="/" class="av-logo" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg"" width="98" alt="Avendorz" /></a>
	</div>
	<header class="site-header">
		<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Menu', 'blogfeedly' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-wrap', 'depth' => 3 ) ); ?>
			<a href="#" id="nav-toggle" class="nav-trigger" title="<?php _e( 'Show Menu', 'blogfeedly' ); ?>"><?php _e( 'Menu', 'blogfeedly' ); ?><span></span></a>
		</nav><!-- .site-navigation -->
		<div class="inner">
			<?php
			if ( has_custom_logo() ) {
				$custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
				$logo_width = stsblogfeedly_get_option( 'logo_retina' ) ? floor( $custom_logo[1]/2 ) : $custom_logo[1];
				printf( '<a href="%1$s" class="custom-logo-link" rel="home"><img src="%2$s" width="%3$s" alt="%4$s" /></a>',
					esc_url( home_url( '/' ) ),
					esc_url( $custom_logo[0] ),
					esc_attr( $logo_width ),
					esc_attr( get_bloginfo( 'name', 'display' ) )
				);
			}
			?>
			<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title<?php if ( ! stsblogfeedly_get_option( 'show_title' ) ) echo ' screen-reader-text'; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
			<p class="site-title<?php if ( ! stsblogfeedly_get_option( 'show_title' ) ) echo ' screen-reader-text'; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<?php if ( stsblogfeedly_get_option( 'show_tagline' ) ) { ?>
			<p id="desc" class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php } ?>
		</div> <!-- .inner -->
			<?php if ( is_front_page() && is_home() ) : ?>
			<a id="search-trigger" class="search-trigger" rel="search"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-search-alt.svg"" width="25" alt="Search Icon" /></a>
			<?php else : ?>
			<a href="/" id="search-trigger" class="search-trigger" rel="search"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-search-alt.svg"" width="25" alt="Search Icon" /></a>
			<?php endif; ?>
	</header><!-- .site-header -->