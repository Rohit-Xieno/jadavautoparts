<?php
/*
  template name: Products
*/

?>
<?php get_header(); ?>

<div class="filter-section">
<div class="filter-sidebar">
  <?php get_template_part('template-parts/sidebar-template'); ?>
</div>


<div class="product-filter-box" id="filter">
  <div class="brand-filter">
    <p>Filter by brand</p>
    <select id="product-brand">
        <option value="">Select Brand</option>
        <?php
        $brands = get_terms('brand');
        foreach ($brands as $brand) {
            echo '<option value="' . $brand->slug . '">' . $brand->name . '</option>';
        }
        ?>
    </select>
  </div>
  <div class="category-filter">
  <form action="">
  <p>Filter by category</p>
      <select id="product-category">
        <option value="">Select Category</option>
        <?php
            $terms = get_terms('product-category');
            foreach ($terms as $term) {
                echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
            }
        ?>
      </select>
    </form>
  </div>
</div>

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
        <!-- <div class="table-row"> -->
          <table style="border-collapse: collapse;" class="product-table-list">
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
            <td class="model-no">
						<button data-id="<?php echo $id = get_the_ID(); ?>" class="cart-popup trigger add-to-cart"><img src="<?php echo get_template_directory_uri().'/assets/images/add-to-enquiry.gif' ?>" alt=""></button>
              <div class="modal">
                <div class="modal-content">
                  <span class="close-button">×</span>
									<h2><?php echo the_title(); ?></h2>
									<p style="margin:10px 0px; font-size: 14px;">Selected product is successfully added or updated to your Cart.</p>
									<a href="/products/" class="btn">Add More Products</a>
									<a href="/cart/" class="btn">View My Cart</a>
                </div>
              </div>
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
      <!-- </div> -->
</section>


</div>
<?php get_footer(); ?>