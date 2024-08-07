<div id="left_box">
	<div id="search_box">
		<div id="sb_title_box">
			<p>Search Products</p>
		</div>
		<form action="/products/" id="search-btn-form" method="get">
			<input type="text" id="custom-field-input" placeholder="Enter OEM Number">
			<button id="search-button" class="SearchBtn" type="submit">Search</button>
		</form>
	</div>

	<div class="sb_title_bottom"></div>
		<div id="browse_box">
			<div id="bb_title_box">
				<p>Browse By Brand</p>
			</div>
			<div class="browse-list">
				<ul>
				<?php
					$brands = get_terms(array(
						'taxonomy' => 'brand',
						'hide_empty' => false,
					));

					if (!empty($brands) && !is_wp_error($brands)) :
						foreach ($brands as $brand) : ?>
							<li class="brand-filter-browse" data-brand="<?php echo $brand->slug; ?>">
								<?php echo $brand->name; ?>
							</li>
						<?php endforeach;
					endif;
					?>
				</ul>


			</div>
		</div>
	<div class="sb_title_bottom"></div><br />
	<br />
	<div align="center">
		<div id="send_enq">
			<h1></h1>
			<p align="left">To send custom request or general enquiries. Please <a href="enquiry_form.php" class="linkb2b">click here</a></p>
		</div>
	</div>
</div>