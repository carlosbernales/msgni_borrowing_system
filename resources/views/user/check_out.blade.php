@include('user/header')

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Your Information
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form id="checkout-form" method="POST" action="/place-order">
                                            @csrf
                                            <p><input type="text" placeholder="First Name" value="{{ $user->firstname }}" disabled></p>
                                            <p><input type="text" placeholder="Last Name" value="{{ $user->lastname }}" disabled></p>
                                            <p><input type="email" placeholder="Email" value="{{ $user->email }}" disabled></p>
                                            <p><input type="tel" placeholder="Phone" value="{{ $user->phone_no }}" disabled></p>
                                            <p><textarea name="others" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            @foreach($cartItems as $cartItem)
                                @php
                                    $product = $products->where('id', $cartItem->fk_product_id)->first();
                                    $productTotal = $cartItem->cart_qty * $product->product_price;
                                @endphp
                                <tr>
                                    <td style="display: none;">{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $cartItem->cart_qty }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>₱{{ $productTotal }}</td>
                                </tr>
                                <!-- Hidden fields for order items -->
                                <input type="hidden" form="checkout-form" name="product_id[]" value="{{ $product->id }}">
                                <input type="hidden" form="checkout-form" name="product_name[]" value="{{ $product->product_name }}">
                                <input type="hidden" form="checkout-form" name="quantity[]" value="{{ $cartItem->cart_qty }}">
                                <input type="hidden" form="checkout-form" name="price[]" value="{{ $product->product_price }}">
                            @endforeach
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td colspan="2"></td>
                                <td>Total</td>
                                <td>₱{{ $cartItems->sum(function($cartItem) use ($products) {
                                    return $cartItem->cart_qty * $products->where('id', $cartItem->fk_product_id)->first()->product_price;
                                }) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="boxed-btn" onclick="event.preventDefault(); document.getElementById('checkout-form').submit();">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user/footer')
