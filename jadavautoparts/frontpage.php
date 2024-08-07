<?php
/*
  template name: Frontpage
*/
?>

<?php get_header(); ?>

      <div class="main home-main">
        <div id="center_box">
          <?php
          $heading = get_field('heading');
          $image = get_field('image');
          $content = get_field('content');
          ?>
          <?php if(!empty($heading)): ?>
            <h1><?= $heading ?><br /></h1>
          <?php endif; ?>
          <?php if(!empty($image)): ?>
            <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>" align="left" style="margin:0 10px 0 0;" />
          <?php endif; ?>
          <?php if(!empty($content)): ?>
          <div align="justify">
              <font color="#808080">
                  <font size="2"><p><?= $content; ?></p></font>
              </font>
          </div>
          <?php endif; ?>
        </div>
        <div class="filter-sidebar">
          <?php get_template_part('template-parts/sidebar-template'); ?>
        </div>
          <div id="right_box">
            <div class="quote2">
            <?php
            $params = array(
              'posts_per_page' => -1, //No of product to be fetched
              'post_type' => 'testimonial',
              // 'post__in' => array(17,108),
              'post__in' => [17, 107],
            );
            $post_query = new WP_Query($params);
            ?>
            <?php if ($post_query->have_posts()) : ?>
            <div class="row">
              <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
              <?php
              the_content(); ?>
              <h4 class="testimonial-post-title">
                <?php the_title(); ?>
              </h4>
             <?php ?>

              <?php endwhile; ?>
            </div>
      <?php endif; ?>
      <?php wp_reset_query(); ?>

            </div>
          </div>
        </div>


<?php get_footer(); ?>
