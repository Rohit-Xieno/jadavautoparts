jQuery(document).ready(function($) {
  $(document).on('click', '#load-more', function() {
    // alert('alert');
      var button = $(this);
      var page = button.data('page');

      console.log(button);
      console.log(page);

      $.ajax({
          url: afp_vars.afp_ajax_url,
          type: 'POST',
          data: {
              action: 'load_more',
              paged: page + 1
          },
          success: function(response) {
              $('#posts-container').append(response);

              // Update button data-page attribute
              var nextPage = button.data('page') + 1;
              button.data('page', nextPage);

              // Remove button if no more pages
              if (!response.includes('Load More')) {
                  button.remove();
              }

								$(document).ready(function() {
									$('.cart-popup-2').magnificPopup({
										type: 'inline',
										preloader: false,
										focus: '#name',

										// When elemened is focused, some mobile browsers in some cases zoom in
										// It looks not nice, so we disable it:
										callbacks: {
											beforeOpen: function() {
												if($(window).width() < 700) {
													this.st.focus = false;
												} else {
													this.st.focus = '#name';
												}
											}
										}
									});

								});

          }
      });
  });



});






// custom popup

const modals = document.querySelectorAll(".modal");
const triggers = document.querySelectorAll(".trigger");
const closeButtons = document.querySelectorAll(".close-button");

function toggleModal(modal) {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    modals.forEach((modal) => {
        if (event.target === modal) {
            toggleModal(modal);
        }
    });
}

triggers.forEach((trigger, index) => {
    trigger.addEventListener("click", () => {
        toggleModal(modals[index]);
    });
});

closeButtons.forEach((closeButton, index) => {
    closeButton.addEventListener("click", () => {
        toggleModal(modals[index]);
    });
});

window.addEventListener("click", windowOnClick);




