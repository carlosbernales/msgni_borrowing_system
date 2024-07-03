
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
	
	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
					<ul>
						<li class="active" data-filter="*">All</li>
						@foreach ($category as $category)
							<li data-filter=".{{ strtolower($category->cat_name) }}">{{ $category->cat_name }}</li>
						@endforeach
					</ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
				@foreach($product as $item)
					<div class="col-lg-4 col-md-6 text-center {{ strtolower($item->cat_name) }}">
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
