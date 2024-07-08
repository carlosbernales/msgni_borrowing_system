

@include('user/header')
<style>
	.product-status {
    background-color: #f44336; /* Example: Red background for status */
    color: #fff; /* Example: White text for visibility */
    padding: 5px 10px; /* Example: Padding around the text */
    margin-top: 10px; /* Example: Spacing above the status */
    font-weight: bold; /* Example: Bold text */
}
</style>
	
<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="{{ asset('product_images/' . $product->product_image) }}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{ $product->product_name }}</h3>
                    <p class="single-product-pricing"> ${{ $product->product_price }}</p>
                    <p>{{ $product->product_desc }}</p>
                    <div class="single-product-form">
                        <p><strong>Selling Stocks: </strong>{{ $product->stocks }}</p>
                        <p><strong>Borrow Stocks: </strong>{{ $product->borrow_stocks }}</p>
                        <p><strong>Category: </strong>{{ $product->cat_name }}</p>
                        @if ($product->status == 'Not Available' || $product->stocks == 0)
                            <a href="javascript:void(0);" class="cart-btn disabled"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                            <a href="javascript:void(0);" class="cart-btn disabled"><i class="fas fa-shopping-cart"></i> Borrow</a>
                            <a href="javascript:void(0);" class="cart-btn disabled" data-product-id="{{ $product->id }}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        @else
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                            @if ($product->borrow_stocks == 0)
                                <a href="javascript:void(0);" class="cart-btn disabled"><i class="fas fa-shopping-cart"></i> Borrow</a>
                            @else
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Borrow</a>
                            @endif
                            <a href="javascript:void(0);" class="cart-btn add-to-cart" data-product-id="{{ $product->id }}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        @endif
                    </div>

                    <h4>Share:</h4>
                    <ul class="product-share">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->
 

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($category as $cat)
                            <li data-filter=".{{ strtolower($cat->id) }}">{{ $cat->cat_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            @foreach($products as $item)
            <div class="col-lg-4 col-md-6 text-center {{ strtolower($item->cat_fk_id) }}">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('/product_details_' . $item->id) }}">
                            <img src="product_images/{{ $item->product_image }}" alt="">
                        </a>
                    </div>
                    <h3>{{ $item->product_name }}</h3>
                    <p class="product-price"><span>{{ $item->product_desc }}</span>₱ {{ $item->product_price }}</p>
                    @if(strtolower($item->status) === 'not available')
                        <div class="product-status">Not Available</div>
                    @elseif($item->stocks == 0)
                        <div class="product-status">Out of Stock</div>
                    @else
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Borrow</a>
                        <a href="javascript:void(0);" class="cart-btn add-to-cart" data-product-id="{{ $item->id }}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->
<script src="jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    // Set position and delay
    alertify.set('notifier', 'position', 'top-right');

    $(document).ready(function() {
        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                url: '{{ url("/add-to-cart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.message);
                    } else {
                        alertify.error('Failed to add product to cart.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alertify.error('An error occurred. Please try again.');
                }
            });
        });
    });
</script>

@include('user/footer')
