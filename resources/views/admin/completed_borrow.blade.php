@include('admin/table_header')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
		<!-- Content Header (Page header) -->
		<section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                        </div>
                        <div class="card-header" style="display: flex; justify-content: space-between;">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Borrow ID</th>
											<th>Product</th>
											<th>Image</th>
											<th>Name</th>
											<th>Contact</th>
											<th>Speed Test</th>
											<th>Status</th>
                                            <th></th>
										</tr>
									</thead>
									<tbody>
									@foreach ($completed_borrow as $borrowed)
											<tr>
												<td>{{ $borrowed->borrow_id }}</td>
												<td>{{ $borrowed->product->product_name }}</td>
												<td>
													<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#product_image_modal_{{ $borrowed->id }}">
														<i class="fa fa-eye"></i>
													</button>
													<!-- Product Image Modal -->
													<div class="modal center-modal fade" id="product_image_modal_{{ $borrowed->id }}" tabindex="-1">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">{{ $borrowed->product->product_name }}</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<img src="/product_images/{{ $borrowed->product->product_image }}" alt="{{ $borrowed->product->product_name }}" style="max-width: 100%; height: auto;">
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>{{ $borrowed->fullname }}</td>
												<td>{{ $borrowed->contact }}</td>
												<td>
													<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#speed_test_modal_{{ $borrowed->id }}">
														<i class="fa fa-eye"></i>
													</button>
													<!-- Speed Test Modal -->
													<div class="modal center-modal fade" id="speed_test_modal_{{ $borrowed->id }}" tabindex="-1">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">Speed Test</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<img src="/speed_test/{{ $borrowed->speed_test }}" style="max-width: 100%; height: auto;">
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>{{ $borrowed->borrow_status }}</td>
                                                <td>
                                                    <form action="/borrow_returned/{{ $borrowed->id }}" method="POST" class="d-inline">
														@csrf
														@method('PUT')
														<button type="submit" class="btn btn-primary btn-sm">Returned</button>
													</form>
                                                </td>
											</tr>
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
		<!-- /.content -->
	  </div>
  </div>
  

  <script src="admin/admin_scripts.js"></script>
  @include('admin/table_footer')
