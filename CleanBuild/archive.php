<?php get_header(); ?>

<div class="main-content">
  <div class="container">
		<h1>News</h1>
		<p>Browse our latest news stories below.  Find out more about industry trends, product news, and the best ways to add style, comfort, and value to your property.  Discover more about how Majestic Designs work and gain inspiration for your own home improvement plans.</p>

		<div class="posts-container">
				<?php while ( have_posts() ) : the_post(); ?>
					<a href="<?php the_permalink(); ?>" title="Read more - <?php the_title(); ?>">
						<div class="post-image">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="post-block">
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div>
					</a>
				<?php endwhile; ?>

				<div class="blog-footer">
					<div class="nav-arrow nav-right"><?php previous_posts_link( 'Newer posts' ); ?></div>
					<div class="nav-arrow nav-left"><?php next_posts_link( 'Older posts', '' ); ?></div>
				</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
