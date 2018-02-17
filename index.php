<?php get_header(); ?>

<main>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_title( '<h2>', '</h2>' ); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
