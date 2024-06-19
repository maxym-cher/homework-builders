<?php
$date = get_field('date_start');
$description = get_field('description');
$image = get_field('featured_image');
?>
<article class="item grid-x align-justify">
    <img class="cell medium-4" alt="test" src="<?php echo $image['url']; ?>">
    <div class="content cell medium-7">
        <h2 class="event-date"><?php echo $date; ?></h2>
        <p><?php echo $description; ?></p>
    </div>
</article>
