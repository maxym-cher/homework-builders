<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>
	
	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->
	<?php get_template_part('header-mega-menu') ?>
	<!-- BEGIN of main content -->
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell">
                <h1>Task for 3</h1>
                1) Function showPlus10 result -> <b><?php showPlus10(12); ?></b> <br />
                2) Function getPlus10 result -> <b><?php echo getPlus10(12); ?></b> <br />
                <h1>Task for 4</h1>
                1) Function pythagoras result -> <b><?php echo pythagoras(3, 4); ?></b> <br />
                2) Function factorial result -> <b><?php echo factorial(5); ?></b> <br />
                3) Function areaRectangle result -> <b><?php areaRectangle(4, 6); ?></b> <br />
                <h1>Task for 5</h1>
                1) Function trimText result -> <b><?php trimText('3) Function areaRectangle result -> A rectangle of length 4 and width 6 has area 24.', 10); ?></b> <br />
                2) Function differentDate result -> <b><?php echo differenceDate(get_the_date('Y-m-d H:i:s')); ?></b> <br />
                2) Function reverseString result -> <b><?php echo reverseString('test 123'); ?></b> <br />
			</div>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
                <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</div>
	<!-- END of main content -->

<?php get_footer(); ?>