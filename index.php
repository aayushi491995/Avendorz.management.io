<?php
/**
 * The main template file.
 */
?>
<?php get_header(); ?>

<div id="content" class="site-content">
	<!-- If has sidebar start -->
	<main id="main" class="site-main main-with-sidebar inner">
		<div id="search" class="search-container">
			<?php get_search_form(); ?>
		</div>
		<!-- Pull Contact Form from Contact Page -->
		<div class="contact-container">
			<?php 
				$id=40; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  
			?>
		</div>
		<div class="main-has-sidebar">
			<!-- If has sidebar end -->
		<?php if ( have_posts() ) : ?>
		<?php if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
	<?php endif; ?>
	<?php
				// Start the Loop.
	while ( have_posts() ) : the_post();
	get_template_part( 'content' );
	endwhile;
	stsblogfeedly_loop_navigation();
			// If no content, include the "No posts found" template.
	else :
		get_template_part( 'content', 'none' );
	endif;
	?>
	<!-- If has sidebar start -->
	</div>
<?php get_template_part( 'right-sidebar'); ?>
<!-- If has sidebar end -->

</main><!-- .site-main -->

</div><!-- .site-content -->
<?php get_footer(); ?>