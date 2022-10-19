
// self invoktion function
(function($) {

    // change excute when remove focus from input.

    $('.item-quantity').on('change', function(e){

        // ajax request:

        $.ajax({

            // setting of ajax:
            
            url: "/cart/" + $(this).data('id'), //data-id attribute
            method: 'put',
            data: {
                quantity: $(this).val(),
                _token: csrf_token
            }
        });
    });

    // ######################################################################################################

    // change excute when remove focus from input.

    $('.li-product-remove').on('click', function(e){

        let id = $(this).data('id');

        // ajax request:

        $.ajax({

            // setting of ajax:
            
            url: "/cart/" + id, //data-id attribute
            method: 'delete',
            data: {
                _token: csrf_token
            },
            success: response => {
                // `` JavaScript Template Literals
                $(`#${id}`).remove();
            }
        });
    });

    // ######################################################################################################

    // change excute when remove focus from input.

    $('.add-to-cart').on('click', function(e){

        // ajax request:

        $.ajax({

            // setting of ajax:
            
            url: "/cart",
            method: 'post',
            data: {
                product_id: $(this).data('id'),
                quantity: $(this).data('quantity'),
                _token: csrf_token
            },
            success: response => {
                alert('product added!')
            }
        });
    });

    // ######################################################################################################

    // change excute when remove focus from input.

    $('.close').on('click', function(e){

        let remove_id = $(this).data('id');

        // ajax request:

        $.ajax({

            // setting of ajax:
            
            url: "/cart/" + remove_id, //data-id attribute
            method: 'delete',
            data: {
                _token: csrf_token
            },
            success: response => {
                // `` JavaScript Template Literals
                $(`#${remove_id}`).remove();
            }
        });
    });


    
})(jQuery)

