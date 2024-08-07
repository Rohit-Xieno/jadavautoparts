<?php get_header();

if(have_posts()):
  while(have_posts()) :
    the_post();
$program_location_heading = get_field('program_location_heading');
$program_registration_heading = get_field('program_registration_heading');
$program_registration_link = get_field('program_registration_cta');
$registration_information_heading = get_field('registration_information_heading');
$tabing_media_content_bg_color = get_field('tabing_media_content_bg_color');
$tabing_media_content_text_color = get_field('tabing_media_content_text_color');
    ?>
    <?php get_template_part('partials/modules/hero'); ?>


      <section class="program-location pt-[100px]">
<div class="container">
  <?php if(!empty($program_location_heading)): ?>
  <h2 class="text-[25px] font-semibold mb-[35px]"><?= $program_location_heading; ?></h2>
  <?php endif; ?>
  <div class="row">
    <div class="container--tabs border border-solid border-[#DEDEDC] rounded-[50px]">
    <div class="row">
      <ul class="nav nav-tabs grid grid-cols-2">
        <li class="active"><a href="#tab-1" class="text-[12px]">CALGARY VILLAGE SQUARE</a></li>
        <li class=""><a href="#tab-2" class="text-[12px]">COCHRANE</a></li>
      </ul>
      <div class="tab-content pt-[60px] md:p-10 p-5">
        <div id="tab-1" class="tab-pane active">
          <span class="glyphicon glyphicon-leaf glyphicon--home--feature two columns text-center"></span>
          <span class="col-md-10">
            <?php if(!empty($program_registration_heading)): ?>
            <h3 class="text-xl mb-[30px]"><?= $program_registration_heading; ?></h3>
            <?php endif; ?>
            <?php if(!empty($program_registration_link)): ?>
            <?php
              if( $program_registration_link ):
                  $link_url = $program_registration_link['url'];
                  $link_title = $program_registration_link['title'];
                  $link_target = $program_registration_link['target'] ? $program_registration_link['target'] : '_self';
                  ?>
                  <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
              <?php endif; ?>

          </span>
          <?php if(!empty($registration_information_heading)): ?>
            <h3 class="green-h3"><?= $registration_information_heading; ?></h3>
          <?php endif; ?>
          <?php if( have_rows('program_registration_info_repeater') ): ?>
            <div class="inner-row grid md:grid-cols-2 grid-cols-1 gap-[25px]">
              <?php while( have_rows('program_registration_info_repeater') ): the_row();
                  $registration_heading = get_sub_field('registration_heading');
                  $registration_content = get_sub_field('registration_content');
                  ?>
                  <div class="registration-info text-base max-w-[355px]">
                    <h4 class="font-medium"><?= $registration_heading; ?></h4>
                    <?= $registration_content; ?>
                  </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <div class="inner-row">
            <?php
              $class_month_heading = get_field('class_month_heading');
              $class_month_content = get_field('class_month_content');
              $class_time_heading = get_field('class_time_heading');
              $class_time_text = get_field('class_time_text');
            ?>
            <?php if(!empty($registration_information_heading)): ?>
              <h3 class="green-h3"><?= $class_month_heading; ?></h3>
            <?php endif; ?>
            <?php if(!empty($class_month_content)): ?>
            <div class="mb-[20px]"><?= $class_month_content; ?></div>
            <?php endif; ?>
            <?php if(!empty($class_time_heading)): ?>
            <h4 class="font-medium"><?= $class_time_heading; ?></h4>
            <?php endif; ?>
            <div><?= $class_time_text; ?></div>
          </div>
          <div class="inner-row">
            <?php
              $parent_resources_heading = get_field('parent_resources_heading');
              ?>
            <h3 class="green-h3"><?= $parent_resources_heading; ?></h3>
            <?php if( have_rows('download_btn_repeater') ): ?>
              <div class="download-btns">
                <?php while( have_rows('download_btn_repeater') ): the_row();
                    $download_btn_link = get_sub_field('download_btn');
                    if( $download_btn_link ):
                      $link_url = $download_btn_link['url'];
                      $link_title = $download_btn_link['title'];
                      $link_target = $download_btn_link['target'] ? $download_btn_link['target'] : '_self';
                    ?>
                    <a class="btn !inline-flex md:mr-[20px] md:text-center !text-left md:mb-[0] mb-[30px] !text-xs mr-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><img class="ml-[11px]" src="<?= get_template_directory_uri().'/assets/images/download-arrow.svg' ?>" alt=""></a>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
          </div>
          <div class="inner-row">
            <?php
            $class_time_links_heading = get_field('class_time_links_heading');
            ?>
            <?php if(!empty($class_time_links_heading)): ?>
              <h3 class="green-h3"><?= $class_time_links_heading ?></h3>
            <?php endif; ?>
            <?php if( have_rows('class_time_links_repeater') ): ?>
            <div class="links">
              <?php while( have_rows('class_time_links_repeater') ): the_row();
              $class_time_link = get_sub_field('class_time_link');
                if( $class_time_link ):
                  $link_url = $class_time_link['url'];
                  $link_title = $class_time_link['title'];
                  $link_target = $class_time_link['target'] ? $class_time_link['target'] : '_self';
                ?>
              <a class="block text-base text-aqua-dark underline mb-[10px]" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="inner-section mt-[80px] rounded-[30px] py-[53px] md:px-10 px-5 flex md:flex-nowrap flex-wrap items-center gap-[56px]" style="background-color: <?= $tabing_media_content_bg_color ?>;">
            <?php $meet_teacher_image = get_field('meet_teacher_image'); if(!empty($meet_teacher_image)): ?>
            <div class="img-box max-w-[404px] relative before:absolute before:left-[130px] before:top-[-20px] before:w-[40px] before:h-[40px] before:bg-aqua-dark before:rounded-[6px] before:rotate-45 after:absolute after:bottom-[-53px] after:bg-[url(../assets/images/meet-bottom-img.svg)]  after:bg-no-repeat after:bg-[85%] after:w-full after:h-[105px]">
              <img class="rounded-[200px]" src="<?= esc_url( $meet_teacher_image['url'] ) ?>" alt="<?= esc_attr($meet_teacher_image['alt']) ?>">
            </div>
            <?php endif; ?>
            <div class="content max-w-[444px] md:mt-[0] mt-[42px]">
              <?php
                $meet_teacher_heading = get_field('meet_teacher_heading');
                $meet_teacher_sub_heading = get_field('meet_teacher_sub_heading');
                $meet_teacher_content = get_field('meet_teacher_content');
              ?>
              <?php if(!empty($meet_teacher_heading)): ?>
              <h3 class="text-sm tracking-[1.05px] font-semibold text-blue-dark mb-[12px]"><?= $meet_teacher_heading; ?></h3>
              <?php endif; ?>
              <?php if(!empty($meet_teacher_sub_heading)): ?>
              <h2 class="text-[30px] font-semibold mb-[25px]" style="color: <?= $tabing_media_content_text_color; ?>"><?= $meet_teacher_sub_heading; ?></h2>
              <?php endif; ?>
              <?php if(!empty($meet_teacher_content)): ?>
              <p><?= $meet_teacher_content; ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div id="tab-2" class="tab-pane">
          <span class="glyphicon glyphicon-fire glyphicon--home--feature two columns text-center"></span>
          <span class="col-md-10">
            <h3>Feature 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </span>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</section>

  <?php endwhile; ?>
  <?php endif; ?>
    <section>
      <?php get_template_part('partials/flexible-modules') ?>
    </section>


<?php get_footer(); ?>