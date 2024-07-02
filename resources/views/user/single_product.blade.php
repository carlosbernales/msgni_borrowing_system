

@include('user/header')
	
	
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
                    <p class="single-product-pricing"><span>Per Kg</span> ${{ $product->product_price }}</p>
                    <p>{{ $product->product_desc }}</p>
                    <div class="single-product-form">
                        <form action="https://themewagon.github.io/fruitkha/index.html">
                            <input type="number" placeholder="0">
                        </form>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Borrow</a>
                        <p><strong>Category: </strong>{{ $product->cat_name }}</p>
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
                            <li data-filter=".{{ strtolower($cat->cat_name) }}">{{ $cat->cat_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            @foreach($products as $item)
            <div class="col-lg-4 col-md-6 text-center {{ strtolower($item->cat_name) }}">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{ url('/product_details_' . $item->id) }}"><img src="product_images/{{ $item->product_image }}" alt=""></a>
                    </div>
                    <h3>{{ $item->product_name }}</h3>
                    <p class="product-price"><span>{{ $item->product_desc }}</span> {{ $item->product_price }}$ </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Borrow</a>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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

	@include('user/footer')
