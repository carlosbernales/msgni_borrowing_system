
@include('user/header')



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
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $cartItem)
                                <tr class="table-body-row">
                                    <td class="product-remove">
                                        <a href="#" class="remove-from-cart" data-cart-id="{{ $cartItem->id }}"><i class="far fa-window-close"></i></a>
                                    </td>
                                    <td class="product-image">
                                        <img src="{{ asset('product_images/' . $products->where('id', $cartItem->fk_product_id)->first()->product_image) }}" alt="">
                                    </td>
                                    <td class="product-name">{{ $products->where('id', $cartItem->fk_product_id)->first()->product_name }}</td>
                                    <td class="product-price">₱{{ $products->where('id', $cartItem->fk_product_id)->first()->product_price }}</td>
                                    <td class="product-quantity">
                                        <input type="number" value="{{ $cartItem->cart_qty }}" data-cart-id="{{ $cartItem->id }}" class="quantity-input" placeholder="0">
                                    </td>
                                    <td class="product-total" id="product-total-{{ $cartItem->id }}">
                                        ₱{{ $cartItem->cart_qty * $products->where('id', $cartItem->fk_product_id)->first()->product_price }}
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
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="https://themewagon.github.io/fruitkha/index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
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
    // Handle quantity change events
        $('.quantity-input').on('change', function() {
            var cartId = $(this).data('cart-id');
            var newQty = parseInt($(this).val());

            if (isNaN(newQty) || newQty <= 0) {
                // Remove the item if quantity is 0 or invalid
                removeFromCart(cartId);
                return;
            }
            // Ajax request to update cart quantity
            updateCartQuantity(cartId, newQty);
        });
        // Function to update cart quantity via Ajax
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
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        // Function to remove item from cart via Ajax
        function removeFromCart(cartId) {
            $.ajax({
                url: '/cart_remove',
                method: 'POST',
                data: {
                    cart_id: cartId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Reload page on success
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        // Handle remove from cart events
        $('.remove-from-cart').on('click', function(e) {
            e.preventDefault();
            var cartId = $(this).data('cart-id');
            removeFromCart(cartId);
        });
    });

    </script>
	<!-- end logo carousel -->
    @include('user/footer')
