
@include('user/header')
<style>
	.product-status {
    background-color: #f44336; 
    color: #fff; 
    padding: 5px 10px; 
    margin-top: 10px; 
    font-weight: bold; 
}
.alertify-notifier .ajs-message.ajs-danger {
    background-color: #dc3545;
    color: white;
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
							@elseif($item->stocks == 0 && $item->borrow_stocks == 0)
								<div class="product-status">Out of Stock</div>
							@elseif($item->stocks == 0 && $item->borrow_stocks != 0)
								<a href="javascript:void(0);" class="cart-btn borrow-btn" data-product-id="{{ $item->id }}" data-borrow-stocks="{{ $item->borrow_stocks }}" data-bs-toggle="modal" data-bs-target="#modal-borrow"><i class="fas fa-shopping-cart"></i> Borrow</a>
								<a href="javascript:void(0);" class="cart-btn add-to-cart disabled" data-product-id="{{ $item->id }}" data-stocks="{{ $item->stocks }}" aria-disabled="true"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							@elseif($item->borrow_stocks == 0 && $item->stocks != 0)
								<a href="javascript:void(0);" class="cart-btn add-to-cart" data-product-id="{{ $item->id }}" data-stocks="{{ $item->stocks }}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								<a href="javascript:void(0);" class="cart-btn borrow-btn disabled" data-product-id="{{ $item->id }}" data-borrow-stocks="{{ $item->borrow_stocks }}" aria-disabled="true"><i class="fas fa-shopping-cart"></i> Borrow</a>
							@else
								<a href="javascript:void(0);" class="cart-btn add-to-cart" data-product-id="{{ $item->id }}" data-stocks="{{ $item->stocks }}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								<a href="javascript:void(0);" class="cart-btn borrow-btn" data-product-id="{{ $item->id }}" data-borrow-stocks="{{ $item->borrow_stocks }}" data-bs-toggle="modal" data-bs-target="#modal-borrow"><i class="fas fa-shopping-cart"></i> Borrow</a>
							@endif
						</div>
					</div>
				@endforeach
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

document.addEventListener('DOMContentLoaded', function() {
	alertify.set('notifier', 'position', 'top-right');

	document.querySelectorAll('.borrow-btn').forEach(function(button) {
		button.addEventListener('click', function(event) {
			var borrowStocks = button.getAttribute('data-borrow-stocks');
			if (borrowStocks == 0) {
				event.preventDefault();
				alertify.notify('No stocks available for borrowing.', 'danger', 5);
			}
		});
	});

	document.querySelectorAll('.add-to-cart').forEach(function(button) {
		button.addEventListener('click', function(event) {
			var stocks = button.getAttribute('data-stocks');
			if (stocks == 0) {
				event.preventDefault();
				alertify.notify('No stocks available for adding to cart.', 'danger', 5);
			}
		});
	});
});
</script>


@include('user/footer')
