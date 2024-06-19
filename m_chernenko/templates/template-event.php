<?php
/**
 * Template Name: Event Page
 */
$arg = array(
        'post_type' => 'events',
        'order' => 'ASC',
        'post_status'    => 'publish',
        'posts_per_page' => 3
);
$events = new WP_Query( $arg );
get_header();
?>
<?php home_slider_template(); ?>
<!--END of HOME PAGE SLIDER-->
<?php get_template_part('header-mega-menu') ?>
<main class="main-content grid-x grid-container align-justify">
	<form class="filter-form cell medium-3">
        <label for="start">Start date</label>
        <input id="start" type="date" required>
        <label for="end">End date</label>
        <input id="end" type="date" required>
        <input id="filter-button" type="submit" value="Filter">
	</form>
    <section class="right-content cell medium-8">
        <?php if ( $events->have_posts() ): ?>
                <?php while ( $events->have_posts() ):
                    $events->the_post();
                    get_template_part('parts/loop-event');
                endwhile; ?>
        <?php if($events->post_count < $events->found_posts): ?>
                <button class="load-more">Load More</button>
        <?php endif; else: ?>
        <p>No posts</p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
