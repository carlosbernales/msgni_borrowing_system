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
                                        <th>Order ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accepted_order as $order)
                                    <tr>
                                        <td onclick="showModal('{{ $order->id }}')">
                                            {{ $order->order_id }}
                                        </td>
                                        <td onclick="showModal('{{ $order->id }}')">
                                            {{ $order->fullname }}
                                        </td>
                                        <td onclick="showModal('{{ $order->id }}')">
                                            {{ $order->order_status }}
                                        </td>
                                        <td onclick="showModal('{{ $order->id }}')">
                                            {{ number_format($order->order_total, 2) }}
                                        </td>
                                        <td>
                                            <form action="/complete_order/{{ $order->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value = "{{$order->email}}" name ="email">
                                                <button type="submit" class="btn btn-primary">Completed</button>
                                            </form>

                                            <form action="/delete_category/{{ $order->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal center-modal fade" id="product_edit_{{ $order->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="margin: 20px;">
                                                    @foreach ($order->orderItems as $orderItem)
                                                    <div style="display: flex; align-items: center; margin-bottom: 20px; border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                                                        <img src="product_images/{{ $orderItem->product->product_image }}" alt="Product Image" width="150" height="100" style="margin-right: 20px;">
                                                        <div>
                                                            <div style="font-weight: bold; margin-bottom: 5px;">{{ $orderItem->product->cat_name }}</div>
                                                            <div style="margin-bottom: 5px;">{{ $orderItem->product->product_name }}</div>
                                                            <div>₱{{ number_format($orderItem->product->product_price, 2) }}</div>
                                                            <div>{{ $orderItem->quantity }}x</div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
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
		<!-- /.content -->
	  </div>
  </div>


  <script src="admin/admin_scripts.js"></script>

  @include('admin/table_footer')
