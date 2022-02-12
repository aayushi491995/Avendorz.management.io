	<?php
	$socnet = array(
		'twitter'    => __( 'Twitter', 'blogfeedly' ),
		'facebook'   => __( 'Facebook', 'blogfeedly' ),
		'googleplus' => __( 'Google+', 'blogfeedly' ),
		'pinterest'  => __( 'Pinterest', 'blogfeedly' ),
		'tumblr'     => __( 'Tumblr', 'blogfeedly' ),
		'instagram'  => __( 'Instagram', 'blogfeedly' ),
		'flickr'     => __( 'Flickr', 'blogfeedly' ),
		'linkedin'   => __( 'LinkedIn', 'blogfeedly' ),
		'dribbble'   => __( 'Dribbble', 'blogfeedly' ),
		'github'     => __( 'GitHub', 'blogfeedly' ),
		'vimeo'      => __( 'Vimeo', 'blogfeedly' ),
		'youtube'    => __( 'YouTube', 'blogfeedly' ),
		'rss'        => __( 'RSS', 'blogfeedly' )
	);
	$socnet_links = '';
	foreach ( $socnet as $key => $val ) {
		if ( stsblogfeedly_get_option( $key ) != '' )
			$socnet_links .= '<a href="' . esc_url( stsblogfeedly_get_option( $key ) ) . '" class="socnet-link" title="' . $val . '"><i aria-hidden="true" class="icon-' . $key . '"></i><span class="screen-reader-text">' . $val . '</span></a>';
	}
	if ( $socnet_links != '' ) { ?>
	<aside class="social-links">
		<div class="inner">
			<?php 
			if ( stsblogfeedly_get_option( 'social_title' ) != '' )
				echo '<h3 class="social-title">' . esc_html( stsblogfeedly_get_option( 'social_title' ) ) . '</h3>';
			echo $socnet_links; 
			?>
		</div><!-- .inner -->
	</aside><!-- .social links -->
	<?php
	} ?>
	<footer class="site-footer">
		<div class="inner">
			<?php get_sidebar(); ?>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-wrap', 'depth' => 2 ) );  ?>
			<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Menu', 'blogfeedly' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => 'menu-wrap', 'depth' => 2 ) ); ?>
				<a href="#" id="menu-toggle" title="<?php _e( 'Show Menu', 'blogfeedly' ); ?>"><?php _e( 'MasterPreneurs Menu', 'blogfeedly' ); ?></a>
			</nav><!-- .site-navigation -->
			<div class="site-info">
				<p class="copyright">
			&copy; <?php echo date('Y'); ?>
			<!-- Delete below lines to remove copyright from footer -->
			<span class="footer-info-right">
				All Rights Reserved. Avendrz Group Inc.<br> <a href="">Privacy Policy</a> | <a href="">Terms of Service</a>
			</span>
			<!-- Delete above lines to remove copyright from footer -->
				</p>
				<a href="#" id="back-to-top" title="<?php _e( 'Back To Top', 'blogfeedly' ); ?>"><i aria-hidden="true" class="icon-chevron-up"></i></a>
			</div><!-- .site-info -->
		</div><!-- .inner -->
	</footer><!-- .site-footer -->
</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>