<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );


function pietergoosen_theme_setup() {
  register_nav_menus( array(
    'header' => 'Header menu',
    'footer' => 'Footer menu'
  ) );
 }

add_action( 'after_setup_theme', 'pietergoosen_theme_setup' );


function one_scripts() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', null, $theme_version);
	// wp_enqueue_style('magnific-style', get_template_directory_uri() . '/assets/css/magnific-popup.min.css', null, $theme_version);
	wp_enqueue_script( 'custom-js', get_theme_file_uri( '/assets/js/custom.js' ), array(), $theme_version, true );
	// wp_enqueue_script( 'magnific-js', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array(), $theme_version, true );
	wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/assets/js/ajax-filter.js', array('jquery'), null, true);

	wp_localize_script('ajax-filter', 'afp_vars', array(
			'afp_nonce' => wp_create_nonce('afp_nonce'), // Create nonce which we later will use to verify AJAX request
			'afp_ajax_url' => admin_url('admin-ajax.php')
	));
}
add_action( 'wp_enqueue_scripts', 'one_scripts' );



// In your theme's functions.php
function enqueue_load_more_script() {
	wp_enqueue_script('load-more-posts', get_template_directory_uri() . '/assets/js/load-more-posts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');



// featured image option add in single post
add_theme_support( 'post-thumbnails' );



// ajax handler
function filter_products_ajax() {
	check_ajax_referer('afp_nonce', 'nonce'); // Check the nonce for security

	$category = isset($_POST['category_c']) ? sanitize_text_field($_POST['category_c']) : '';
	$brand = isset($_POST['brand_b']) ? sanitize_text_field($_POST['brand_b']) : '';
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;



	$args = array(
			'post_type' => 'product',
			'posts_per_page' => 6,
			'paged' => $paged,
			'tax_query' => array(
            'relation' => 'AND',
        ),
	);

	if (!empty($category)) {
			$args['tax_query'][] = array(
							'taxonomy' => 'product-category',
							'field' => 'slug',
							'terms' => $category
			);
	}


	if (!empty($brand)) {
		$args['tax_query'][] = array(
				'taxonomy' => 'brand',
				'field' => 'slug',
				'terms' => $brand,
		);
}




	$query = new WP_Query($args);
	?>

	<?php if ($query->have_posts()): ?>
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
			<?php while ($query->have_posts()) : $query->the_post(); ?>
					<tr>
            <td>
              <div class="product-img"><?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full mx-auto' ) ); ?></div>
              <span class="product-no"><?php echo get_field('product_number'); ?></span>
            </td>
            <td class="oem-no"><?php echo get_field('oem_number'); ?></td>
            <td class="oem-no"><?php echo the_title(); ?></td>
            <td class="product-title"><?php echo get_field('model_number'); ?></td>
            <td class="model-no">
						<a href="/cart?cart=<?php echo $id = get_the_ID(); ?>" class="cart-popup trigger"><img src="<?php echo get_template_directory_uri().'/assets/images/add-to-enquiry.gif' ?>" alt=""></a>
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
			<?php endwhile;
			/* wp_reset_postdata(); */
			// Check if there are more posts to load
			$total_pages = $query->max_num_pages;
			$current_page = $paged;

			if ($total_pages > $current_page) {
				$next_page = $current_page + 1;
				echo '<button id="load-more" data-page="' . $next_page . '">Load More</button>';
			}
				?>
				</tbody> </table>
				<?php else: ?>
				<p>No products found_both_filter</p>
				<?php endif;?>
				 <?php
			//  wp_reset_postdata();
			wp_die();
	}
add_action('wp_ajax_filter_products', 'filter_products_ajax');
add_action('wp_ajax_nopriv_filter_products', 'filter_products_ajax');






// browse product brand
function filter_products_brand() {
	$brand_browse = $_POST['brand'];
	$args = array(
			'post_type' => 'product',
			'tax_query' => array(
					array(
							'taxonomy' => 'brand',
							'field' => 'slug',
							'terms' => $brand_browse
					)
			)
	);
	$query = new WP_Query($args);?>
		<?php
	if ($query->have_posts()) : ?>
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
			<?php $k=1; while ($query->have_posts()) : $query->the_post();?>
			<tr>
			<td>
				<div class="product-img"><?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full mx-auto' ) ); ?></div>
				<span class="product-no"><?php echo get_field('product_number'); ?></span>
			</td>
			<td class="oem-no"><?php echo get_field('oem_number'); ?></td>
			<td class="oem-no"><?php echo the_title(); ?></td>
			<td class="product-title"><?php echo get_field('model_number'); ?></td>
			<td class="model-no">
						<a href="/cart?cart=<?php echo $id = get_the_ID(); ?>" class="cart-popup trigger"><img src="<?php echo get_template_directory_uri().'/assets/images/add-to-enquiry.gif' ?>" alt=""></a>
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
			<?php $k++; endwhile;?>
			</tbody></table>
	<?php else :
			echo 'No products found_brand_browse';
	endif;?>

<?php
	wp_die();
}
add_action('wp_ajax_filter_products_brand', 'filter_products_brand');
add_action('wp_ajax_nopriv_filter_products_brand', 'filter_products_brand');


// search for oem number
// Add AJAX action for logged-in users
add_action('wp_ajax_search_products', 'search_products');
// Add AJAX action for guests
add_action('wp_ajax_nopriv_search_products', 'search_products');

function search_products() {
    // Check for nonce security
    check_ajax_referer('afp_nonce', 'nonce');

    // Get the custom field value from AJAX request
    $custom_field_value = sanitize_text_field($_POST['oem_number']);

    // Set up WP_Query arguments
    $args = array(
        'post_type' => 'product',
        'meta_query' => array(
            array(
                'key' => 'oem_number', // Change to your custom field key
                'value' => $custom_field_value,
                'compare' => 'LIKE',
            ),
        ),
    );

    // Execute the query
    $query = new WP_Query($args); ?>
		<?php
    // Check if any products are found
    if ($query->have_posts()) { ?>
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
			<?php $M=1; while ($query->have_posts()) {
            $query->the_post(); ?>
            // Output product data (you can customize this part)

						<tr>
						<td>
							<div class="product-img"><?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full mx-auto' ) ); ?></div>
							<span class="product-no"><?php echo get_field('product_number'); ?></span>
						</td>
						<td class="oem-no"><?php echo get_field('oem_number'); ?></td>
						<td class="oem-no"><?php echo the_title(); ?></td>
						<td class="product-title"><?php echo get_field('model_number'); ?></td>
						<td class="model-no">
						<a href="/cart?cart=<?php echo $id = get_the_ID(); ?>" class="cart-popup trigger"><img src="<?php echo get_template_directory_uri().'/assets/images/add-to-enquiry.gif' ?>" alt=""></a>
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
       <?php $M++;} ?>
			 </tbody> </table>
    <?php } else {
        echo '<div>No products found_OEM</div>';
    }

    wp_reset_postdata(); ?>
		<?php
    wp_die(); // End AJAX request
}




















function load_more(){

	$paged = $_POST['paged'];
      $blog = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'paged' => $paged
      );
      $blogquery = new WP_Query($blog);

      // echo '<pre>';
			// print_r($blog_query);
			// echo '</pre>';

			if ($blogquery->have_posts()): ?>
				<?php $j=1; while ($blogquery->have_posts()) : $blogquery->the_post(); ?>
						<tr>
							<td>
								<div class="product-img"><?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full mx-auto' ) ); ?></div>
								<span class="product-no"><?php echo get_field('product_number'); ?></span>
							</td>
							<td class="oem-no"><?php echo get_field('oem_number'); ?></td>
							<td class="oem-no"><?php echo the_title(); ?></td>
							<td class="product-title"><?php echo get_field('model_number'); ?></td>
							<td class="model-no">
						<a href="/cart?cart=<?php echo $id = get_the_ID(); ?>" class="cart-popup trigger"><img src="<?php echo get_template_directory_uri().'/assets/images/add-to-enquiry.gif' ?>" alt=""></a>
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

				<?php $j++; endwhile;  wp_reset_postdata();?>



			<?php
				/* wp_reset_postdata(); */
				// Check if there are more posts to load
				$total_pages = $blogquery->max_num_pages;
				$current_page = $paged;

				if ($total_pages > $current_page) {
					$next_page = $current_page + 1;
					echo '<button id="load-more" data-page="' . $next_page . '">Load More</button>';
			}
				?>
		<?php else: ?>
				<p>No products found_J</p>
				<?php   endif; ?>




<?php } ?>


<?php
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more'); ?>



<?php
session_start();

// Initialize cart if not already present
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to add a product to the cart
function addToCart($productId) {
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1; // Add product with quantity 1
    } else {
        $_SESSION['cart'][$productId] += 1; // Increment quantity
    }
}

// Check if product ID is provided in the request
if (isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);
    addToCart($productId);
    echo json_encode(['success' => true, 'message' => 'Product added to cart.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid product ID.']);
}
?>






<?php

function filter_products_ID() {
	$productId = isset($_POST['product_id']) ? sanitize_text_field($_POST['product_id']) : '';
	$args = array(
			'post_type' => 'product',
			'posts_per_page' => 1,
			// 'id' => $productId,
    	'post__in'=> array($productId)
	);
	$query = new WP_Query($args);?>
		<?php
	if ($query->have_posts()) : ?>
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
			<?php $k=1; while ($query->have_posts()) : $query->the_post();?>
			<tr>
			<td>
				<div class="product-img"><?php $blog_img = the_post_thumbnail( 'full', array( 'class' => 'rounded-full mx-auto' ) ); ?></div>
				<span class="product-no"><?php echo get_field('product_number'); ?></span>
			</td>
			<td class="oem-no"><?php echo get_field('oem_number'); ?></td>
			<td class="oem-no"><?php echo the_title(); ?></td>
			<td class="product-title"><?php echo get_field('model_number'); ?></td>
			<td class="model-no">
						<a href="/cart?cart=<?php echo $id = get_the_ID(); ?>" class="cart-popup trigger"><img src="<?php echo get_template_directory_uri().'/assets/images/add-to-enquiry.gif' ?>" alt=""></a>
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
			<?php $k++; endwhile;?>
			</tbody></table>
	<?php else :
			echo 'No products found_brand_browse';
	endif;?>

<?php
	wp_die();
}
add_action('wp_ajax_filter_products_ID', 'filter_products_ID');
add_action('wp_ajax_nopriv_filter_products_ID', 'filter_products_ID');
?>














