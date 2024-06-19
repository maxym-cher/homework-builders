<?php
/**
 * Template Name: Confirmation Page
 */
get_header(); ?>
	
	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->
	
	<!-- BEGIN of main content -->
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
            <?php echo do_shortcode('[user_info]') ?>
		</div>
	</div>
	<!-- END of main content -->

<?php get_footer(); ?>s