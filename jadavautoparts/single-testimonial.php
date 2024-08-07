<?php get_header(); ?>


<section class="single-testimonials">
  <div class="container">
      <?php if (have_posts()) : ?>
      <div class="row">
        <?php while (have_posts()) : the_post(); ?>
        <?php
         the_content();
         the_title();
         ?>

        <?php endwhile; ?>
      </div>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
  </div>
</section>

<?php get_footer(); ?>