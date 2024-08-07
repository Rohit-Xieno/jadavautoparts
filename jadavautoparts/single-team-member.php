<?php get_header(); ?>


<section class="single team-members pb-[100px] lg:pt-[132px] pt-[70px] relative overflow-hidden">
  <div class="absolute -right-24 -right-14 lg:top-0 md:top-[100px] top-[180px] lg:max-w-[467px] md:max-w-[350px] sm:max-w-[300px] max-w-[250px]">
    <img src="<?= get_template_directory_uri().'/assets/images/space.svg' ?>" alt="">
  </div>
  <div class="container">
      <?php if (have_posts()) : ?>
      <div class="row">
        <?php while (have_posts()) : the_post(); ?>
        <div class="inner-row xl:px-0 px-[15px]">
          <div class="member-detail lg:pb-[100px] pb-[250px]">
            <h2 class="text-[30px] leading-[35px] font-semibold mb-[22px]"><?php the_title(); ?></h2>
            <h3 class="designation text-[25px] leading-[30px] text-blue-dark font-normal"><?php echo get_field('designation'); ?></h3>
            <div class="social-media-team-member flex gap-5 mt-[45px]">
            <?php if(have_rows('social_media_repeater')): ?>
              <?php while(have_rows('social_media_repeater')): the_row();
                $social_icon = get_sub_field('social_icon');
              ?>
                <?php
                $link = get_sub_field('social_link');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="w-[18px]" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?= esc_url($social_icon['url']) ?>" alt="<?= esc_attr($social_icon['alt']) ?>"></a>
                <?php endif; ?>
              <?php endwhile; ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="col member-content flex md:flex-row flex-col md:gap-[68px] gap-10">
            <div class="img-box max-w-[432px] w-full">
              <div class="relative before:absolute before:w-[40px] before:h-[40px] before:bg-yellow-dark before:rounded-[6px] before:rotate-45 before:left-[-20px] before:top-[60%]">
                <?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full w-full' ) ); ?>
              </div>
            </div>
            <div class="content pt-[30px] max-w-[460px] text-center">
              <div class="content text-xl text-left"><?php the_content(); ?></div>
            </div>
          </div>
          <a class="back inline-flex mt-[100px] text-[13px] font-medium tracking-[0.97px] uppercase" href="/team/">
            <img class="mr-[15px]" src="<?= get_template_directory_uri().'/assets/images/back-icon.svg' ?>" alt="">
            BACK TO LEADERSHIP TEAM
          </a>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
  </div>
</section>

<?php get_footer(); ?>