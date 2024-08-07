
<?php
get_header(); ?>

<section class="products" id="products-list">
<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $blog = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'paged' => $paged
      );
      $blog_query = new WP_Query($blog);
      ?>
        <div class="table-row">
          <table style="border-collapse: collapse;">
            <thead>
              <tr>
                <th></th>
                <th>OEM No.</th>
                <th>Product Title</th>
                <th>Model No.</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="posts-container">
      <?php if ($blog_query->have_posts()) : ?>
          <?php $j=1; while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
          <tr>
            <td>
              <div class="product-img"><?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full mx-auto' ) ); ?></div>
              <span class="product-no"><?php echo get_field('product_number'); ?></span>
            </td>
            <td class="oem-no"><?php echo get_field('oem_number'); ?></td>
            <td class="oem-no"><?php echo the_title(); ?></td>
            <td class="product-title"><?php echo get_field('model_number'); ?></td>
            <td class="model-no"><a href="#test-modal-<?php echo $j; ?>" class="cart-popup">add to cart</a></td>

          <td id="test-modal-<?php echo $j; ?>" class="white-popup-block mfp-hide">
            <h2><?php echo the_title(); ?></h2>
            <p style="margin:10px 0px; font-size: 14px;">Selected product is successfully added or updated to your Cart.</p>
            <a href="/products" class="btn">Add More Products</a>
            <a href="/cart?cart=<?php echo $id = get_the_ID(); ?>" class="btn">View My Cart</a>
          </td>
          </tr>
          <?php $j++; endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </tbody>
          <tfoot>
            <tr>
            <td>
            <?php if ($blog_query->max_num_pages > 1) : ?>
            <button id="load-more" data-page="1">Load More</button>
            <?php endif; ?>
            </td>
            </tr>
          </tfoot>
        </table>
      </div>
</section>

<?php get_footer(); ?>