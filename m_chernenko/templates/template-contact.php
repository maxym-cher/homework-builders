<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<main class="main-content">
	<section class="contact">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<article id="<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="grid-container">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <form action="<?php echo admin_url('admin-post.php?action=share'); ?>" method="post">
                            <label for="first-name" >First Name*</label>
                            <input id="first-name" type="text" name="first-name" placeholder="First Name" required >
                            <label for="last-name">Last Name</label>
                            <input id="last-name" type="text" name="last-name" placeholder="Last Name">
                            <label for="email">Email*</label>
                            <input id="email" type="email" name="email" placeholder="Email" required >
                            <input type="hidden" name="post-id" value="<?php echo $_GET['post_id'] ?>">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject">
                                <option value="for_me">Send only for me</option>
                                <option value="for_admin">Send to admin</option>
                            </select>
                            <label for="message">Message*</label>
                            <textarea id="message" name="message" required ></textarea>
                            <input type="submit" name="submit" value="Submit">
                        </form>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
