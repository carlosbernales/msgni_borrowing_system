
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
							<li data-filter=".{{ strtolower($category->id) }}">{{ $category->cat_name }}</li>
						@endforeach
					</ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
				@foreach($product as $item)
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
								<a href="javascript:void(0);" class="cart-btn add-to-cart" data-product-id="{{ $item->id }}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								<a href="#" class="cart-btn borrow-btn" data-product-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#modal-borrow"><i class="fas fa-shopping-cart"></i> Borrow</a>

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

			<div class="modal center-modal fade" id="modal-borrow" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"></h5>
						</div>
						<form method="POST" action="/upload_borrow" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">

								<div class="mb-3">
									<label for="inputField" class="form-label">Name</label>
									<input type="text" class="form-control" name="fullname" value="{{ $account->firstname ?? '' }} {{ $account->lastname ?? '' }}" >
									<input type="hidden" class="form-control" name="user_fk_id" value="{{ $account->id ?? '' }} " >
									<input type="hidden" class="form-control" name="product_fk_id" id ="product_fk_id" >
								</div>
								<div class="mb-3">
									<label for="inputField" class="form-label">Email</label>
									<input type="text" class="form-control" name="email" value="{{ $account->email ?? '' }}">
								</div>
								<div class="mb-3">
									<label for="inputField" class="form-label">Contact</label>
									<input type="text" class="form-control" name="contact" value="{{ $account->phone_no ?? '' }}">
								</div>
								<div class="mb-3">
									<label for="inputField" class="form-label">Speed Test</label>
									<input type="file" class="form-control" name="speed_test" required >
									<br>
									<a href="https://www.speedtest.net/">Click this, capture you speedtest and upload it here for validation</a>
								</div>
							</div>
							<div class="modal-footer modal-footer-uniform">
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary float-end">Submit</button>
							</div>
						</form>
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

	$(document).ready(function() {
        $('.borrow-btn').click(function() {
            var productId = $(this).data('product-id');
            $('#product_fk_id').val(productId); // Set the product_fk_id field in the form
        });
    });
</script>


@include('user/footer')
