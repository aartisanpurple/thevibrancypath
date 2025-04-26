$(document).ready(function() {

    // Quantity increase/decrease
    $('.quantity-increase').click(function() {
        let qty = parseInt($('#productQuantity').val()) || 1;
        $('#productQuantity').val(qty + 1);
    });

    $('.quantity-decrease').click(function() {
        let qty = parseInt($('#productQuantity').val()) || 1;
        if (qty > 1) {
            $('#productQuantity').val(qty - 1);
        }
    });

    // AJAX Add to Cart
    $('.add-to-cart').click(function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        const name = button.data('name');
        const price = button.data('price');
        const image = button.data('img');
        const quantity = parseInt($('#productQuantity').val()) || 1;

        $.ajax({
            url: "{{ route('customer.store.api') }}", // Updated to use the store-api route
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: id,
                product_name: name,
                product_price: price,
                product_img: image,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    $('.cart-count').text(response.count);
                    // Show toast with message
                    $('#cart-toast .toast-body').text('Product added to cart!');
                    $('#cart-toast').fadeIn().delay(2000).fadeOut();
                    // alert("Added to cart!");
                }
            },
            error: function() {
                // alert("Something went wrong. Try again.");
            }
        });
    });

});