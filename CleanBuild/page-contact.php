<?php
/*
 Template Name: Contact Page
*/
?>

<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php the_content(); ?>

	<?php endwhile; else : ?>
			<article id="post-not-found">
				<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
			</article>
	<?php endif; ?>

	</div>


<?php get_footer(); ?>
