<?php get_header(); while (have_posts()) : the_post(); acdd_band('ACDD', get_the_title()); ?>
<main id="main" class="sec"><div class="c entry"><?php the_content(); ?></div></main>
<?php endwhile; get_footer();
