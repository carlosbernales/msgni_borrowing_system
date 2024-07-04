
@include('user/header')

@php
    $total = 0; 
@endphp

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock">Stocks</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $cartItem)
                                @php
                                    $product = $products->where('id', $cartItem->fk_product_id)->first();
                                    $productTotal = $cartItem->cart_qty * $product->product_price;
                                    $total += $productTotal; 
                                @endphp
                                <tr class="table-body-row">
                                    <td class="product-remove">
                                        <a href="#" class="remove-from-cart" data-cart-id="{{ $cartItem->id }}"><i class="far fa-window-close"></i></a>
                                    </td>
                                    <td class="product-image">
                                        <img src="{{ asset('product_images/' . $product->product_image) }}" alt="">
                                    </td>
                                    <td class="product-name">{{ $product->product_name }}</td>
                                    <td class="product-price">₱{{ $product->product_price }}</td>
                                    <td class="product-stock">{{ $product->stocks }}</td>
                                    <td class="product-quantity">
                                        <button class="quantity-decrement" data-cart-id="{{ $cartItem->id }}">-</button>
                                        <input type="text" value="{{ $cartItem->cart_qty }}" data-cart-id="{{ $cartItem->id }}" class="quantity-input" placeholder="0" disabled style="width: 50px; text-align: center;">
                                        <button class="quantity-increment" data-cart-id="{{ $cartItem->id }}">+</button>
                                    </td>
                                    <td class="product-total" id="product-total-{{ $cartItem->id }}">
                                        ₱{{ $productTotal }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>₱{{ $total }}</td> <!-- Display accumulated total -->
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                    <a href="{{ url('/checkout.' . session('user_id')) }}" class="boxed-btn black">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.quantity-increment').on('click', function() {
        var cartId = $(this).data('cart-id');
        var input = $('input[data-cart-id="' + cartId + '"]');
        var currentQty = parseInt(input.val());
        if (!isNaN(currentQty)) {
            input.val(currentQty + 1).trigger('change');
        }
    });

    $('.quantity-decrement').on('click', function() {
        var cartId = $(this).data('cart-id');
        var input = $('input[data-cart-id="' + cartId + '"]');
        var currentQty = parseInt(input.val());
        if (!isNaN(currentQty) && currentQty > 1) {
            input.val(currentQty - 1).trigger('change');
        } else {
            removeFromCart(cartId);
        }
    });

    $('.quantity-input').on('change', function() {
        var cartId = $(this).data('cart-id');
        var newQty = parseInt($(this).val());

        if (isNaN(newQty) || newQty <= 0) {
            removeFromCart(cartId);
            return;
        }
        updateCartQuantity(cartId, newQty);
    });

    function updateCartQuantity(cartId, newQty) {
        $.ajax({
            url: '/cart_update',
            method: 'POST',
            data: {
                cart_id: cartId,
                new_qty: newQty,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.product_price === undefined || isNaN(parseFloat(response.product_price))) {
                    console.error('Invalid product price received.');
                    return;
                }
                var productPrice = parseFloat(response.product_price);
                var newTotal = newQty * productPrice;
                $('#product-total-' + cartId).text('₱' + newTotal.toFixed(2));

                // Calculate and update the overall cart total
                var total = 0;
                $('.product-total').each(function() {
                    var productTotal = parseFloat($(this).text().replace('₱', ''));
                    if (!isNaN(productTotal)) {
                        total += productTotal;
                    }
                });
                $('.total-data td:last-child').text('₱' + total.toFixed(2));
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function removeFromCart(cartId) {
        $.ajax({
            url: '/cart_remove',
            method: 'POST',
            data: {
                cart_id: cartId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $('.remove-from-cart').on('click', function(e) {
        e.preventDefault();
        var cartId = $(this).data('cart-id');
        removeFromCart(cartId);
    });
});


///////disable button + when cart == stocks

 $(document).ready(function() {
        $(document).on('click', '.quantity-increment', function() {
            var $row = $(this).closest('.table-body-row');
            var qtyInput = $row.find('.quantity-input');
            var currentQty = parseInt(qtyInput.val());
            var stock = parseInt($row.find('.product-stock').text());

            if (currentQty < stock) {
                qtyInput.val(currentQty);
                updateProductTotal($row);
            }

            toggleIncrementButton($row);
        });

        $(document).on('click', '.quantity-decrement', function() {
            var $row = $(this).closest('.table-body-row');
            var qtyInput = $row.find('.quantity-input');
            var currentQty = parseInt(qtyInput.val());

            if (currentQty > 0) {
                qtyInput.val(currentQty);
                updateProductTotal($row);
            }

            toggleIncrementButton($row);
        });

        function updateProductTotal($row) {
            var qty = parseInt($row.find('.quantity-input').val());
            var price = parseFloat($row.find('.product-price').text().replace('₱', ''));
            var total = qty * price;
            $row.find('.product-total').text('₱' + total.toFixed(2));
        }

        function toggleIncrementButton($row) {
            var qty = parseInt($row.find('.quantity-input').val());
            var stock = parseInt($row.find('.product-stock').text());
            var $incrementBtn = $row.find('.quantity-increment');

            if (qty >= stock) {
                $incrementBtn.prop('disabled', true);
            } else {
                $incrementBtn.prop('disabled', false);
            }
        }

        $('.table-body-row').each(function() {
            var $row = $(this);
            var qty = parseInt($row.find('.quantity-input').val());
            var stock = parseInt($row.find('.product-stock').text());
            var $incrementBtn = $row.find('.quantity-increment');

            if (qty >= stock) {
                $incrementBtn.prop('disabled', true);
            }
        });
    });
</script>

<!-- end logo carousel -->
@include('user/footer')
