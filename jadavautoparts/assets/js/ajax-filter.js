jQuery(document).ready(function($) {

// product brand and product category filter (dropdown selection)
  $('#filter').on('change', 'select', function() {
      const category = $('#product-category').val();
      const brand = $('#product-brand').val();
      const nonce = afp_vars.afp_nonce;
      $.ajax({
        url: afp_vars.afp_ajax_url,
          type: 'POST',
          data: {
              action: 'filter_products',
              category_c: category,
              brand_b: brand,
              nonce: nonce,
              paged: 1 // Reset to page 1 on filter change
          },
          success: function(response) {
              $('#products-list').html(response);
          }
      });
  });




// product brand browse(onclick selection)
$('.brand-filter-browse').on('click', function() {
    const brand_browse = $(this).data('brand');
    $.ajax({
        url: afp_vars.afp_ajax_url,
        type: 'POST',
        data: {
            action: 'filter_products_brand',
            brand: brand_browse
        },
        success: function(response) {
            $('#products-list').html(response);
        }
    });
});


// product search by OEM Number(input type)
$('#search-btn-form').on('submit', function(e) {
    e.preventDefault();
    const customFieldValue = $('#custom-field-input').val();
    const nonce_e = afp_vars.afp_nonce;
    console.log(customFieldValue);

    $.ajax({
        url: afp_vars.afp_ajax_url,
        type: 'POST',
        data: {
            action: 'search_products',
            oem_number: customFieldValue,
            nonce: nonce_e,

        },
        success: function(response) {
            $('#products-list').html(response);
        },
        error: function() {
            $('#products-list').html('<div>An error occurred</div>');
        }
    });
});


$('.add-to-cart').click(function() {
    const productId = $(this).data('id');
    console.log(productId);
    const nonce_n = afp_vars.afp_nonce;

    $.ajax({
        url: afp_vars.afp_ajax_url,
        type: 'POST',
        // data: { product_id: productId },
        data: {
              action: 'filter_products_ID',
              product_id: productId,
              nonce: nonce_n,
              paged: 1 // Reset to page 1 on filter change
          },
        success: function(response) {
            $('#products-list').html(response);
            // const result = JSON.parse(response);
            // if (result.success) {
            //     alert(result.message);
            // } else {
            //     alert(result.message);
            // }
        },
        error: function() {
            alert('An error occurred.');
        }
    });
});


});