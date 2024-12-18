@include('admin/table_header')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box"> 
                        <div class="box-header with-border" style="display: flex; justify-content: space-between;">
                        <h3 class="box-title">Products</h3>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-center">
                                +
                            </button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Stock Price</th>
                                            <th>Selling Price</th>
                                            <th>Selling Stocks</th>
                                            <th>Borrow Stocks</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $product)
                                        <tr>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                {{ $product->cat_name }}
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                {{ $product->product_name }}
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                <img src="product_images/{{ $product->product_image }}" alt="Product Image" width="150" height="100">
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">₱
                                                {{ number_format($product->stock_price, 2) }}
                                            </td>

                                            <td onclick="showModal('{{ $product->id }}')">₱
                                                {{ number_format($product->product_price, 2) }}
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                {{ $product->stocks }}
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                {{ $product->borrow_stocks }}
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                {{ $product->product_desc }}
                                            </td>
                                            <td onclick="showModal('{{ $product->id }}')">
                                                {{ $product->status }}
                                            </td>
                                            <td>
                                                <form action="/delete_category/{{ $product->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal center-modal fade" id="product_edit_{{ $product->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Product</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="/edit_product/{{ $product->id }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="category" class="form-label">Select Category:</label>
                                                                <select name="cat_fk_id" id="category" class="form-control">
                                                                    @foreach($category as $cat)
                                                                        <option value="{{ $cat->id }}" {{ $cat->id == $product->cat_fk_id ? 'selected' : '' }}>
                                                                            {{ $cat->cat_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="inputField" class="form-label">Product Name</label>
                                                                <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="inputField" class="form-label">Stock Price</label>
                                                                    <input type="number" class="form-control" name="stock_price" step="0.01" value="{{ $product->stock_price }}">
                                                                </div> <!-- Closing div for col-md-6 mb-3 -->

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="inputField" class="form-label">Selling Price</label>
                                                                    <input type="number" class="form-control" name="product_price" step="0.01" value="{{ $product->product_price }}">
                                                                </div> <!-- Closing div for col-md-6 mb-3 -->
                                                            </div> <!-- Closing div for row -->

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="inputField" class="form-label">Selling Quantity</label>
                                                                    <input type="number" class="form-control" name="stocks">
                                                                </div> <!-- Closing div for col-md-6 mb-3 -->

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="inputField" class="form-label">Borrow Quantity</label>
                                                                    <input type="number" class="form-control" name="borrow_stocks">
                                                                </div> <!-- Closing div for col-md-6 mb-3 -->
                                                            </div> <!-- Closing div for row -->

                                                            <div class="mb-3">
                                                                <label for="inputField" class="form-label">Description</label>
                                                                <input type="text" class="form-control" name="product_desc" value="{{ $product->product_desc }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="inputField" class="form-label">Status</label>
                                                                <select name="status"  class="form-control">
                                                                    <option value="{{ $product->status }}">{{ $product->status }}</option>
                                                                    @if ($product->status == 'Available')
                                                                        <option value="Not Available">Not Available</option>
                                                                    @else
                                                                        <option value="Available">Available</option>
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="inputField" class="form-label">Image</label>
                                                                <input type="file" class="form-control" name="product_image" value="">
                                                                <input type="hidden" name="old_image" value="{{ $product->product_image }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer modal-footer-uniform">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary float-end">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>


        


        <div class="modal center-modal fade" id="modal-center" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/add_products" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="category" class="form-label">Select Category:</label>
                                <select name="cat_fk_id" id="category" class="form-control">
                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inputField" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name" >
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputField" class="form-label">Selling Price</label>
                                    <input type="number" class="form-control" step="0.01" name="product_price">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputField" class="form-label">Stock Price</label>
                                    <input type="number" class="form-control" step="0.01" name="stock_price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputField" class="form-label">Selling Quantity</label>
                                    <input type="number" class="form-control" name="stocks" >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputField" class="form-label">Borrow Quantity</label>
                                    <input type="number" class="form-control" name="borrow_stocks" >
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="inputField" class="form-label">Product Description</label>
                                <input type="text" class="form-control" name="product_desc" >
                            </div>
                            <div class="mb-3">
                                <label for="inputField" class="form-label">Image</label>
                                <input type="file" class="form-control" name="product_image" >
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary float-end">Insert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


		<!-- /.content -->
	  </div>
  </div>


  <script src="admin/admin_scripts.js"></script>
  <script>
    function showModal(categoryId) {
        var modalId = '#product_edit_' + categoryId;
        var modalElement = document.querySelector(modalId);
        var bootstrapModal = new bootstrap.Modal(modalElement);
        bootstrapModal.show();
    }
  </script>

  @include('admin/table_footer')
