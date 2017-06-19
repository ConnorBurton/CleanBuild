<?php
/*
 Template Name: Overview Page
*/
?>

<?php get_header(); ?>

<div class="main-content">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>
