<?php
/**
 * Template Name: Create an Account
 */
do_action('gform_validation', do_shortcode('[gravityform id="2" title="true"]') );
get_header(); ?>
	
	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->
	
	<!-- BEGIN of main content -->
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
            <?php echo do_shortcode('[gravityform id="2" title="true"]') ?>
		</div>
	</div>
	<!-- END of main content -->

<?php get_footer(); ?>s