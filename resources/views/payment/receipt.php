<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/css/adminlte.min.css" integrity="sha512-GVn1gRv3XatzIX7UxIwD8psq158h0Ru+8HEaQLFMA15A1JCU4gO8j64i6e1uZwHo0loxiXLisUXbwlbIyZq68A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <div class="invoice p-3 mb-3" style="margin-top:50px">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Mr. Spin Laundry Shop
                    <small class="float-right">Date: <?php echo $customer->pickupdate;?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div><br>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Mr. Spin Laundry Shop</strong><br>
                    2869 Rizal Ave Ext, Santa Cruz, Manila <br>
                    1013 Metro Manila, <br>
                    Philippines
                    Phone: 09664781026<br>
                    Email: mrspin.laundry@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $customer->fullname;?></strong><br>
                    <?php echo $customer->address;?><br>
                    <?php echo $customer->city;?><br>
                    Phone: <?php echo $customer->phone;?><br>
                    Email: <?php echo $customer->email;?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <?php echo $customer->trackingcode;?></b><br>
                  <br>
                  <b>Order ID:</b> <?php echo $customer->id;?><br>
                  <b>Payment Due:</b> <?php echo $customer->pickupdate;?><br>
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <br>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Laundry Item</th>
                      <th>Service</th>
                      <th>Unit</th>
                      <th>Price Per Unit</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?php echo $customer->laundry;?></td>
                      <td><?php echo $customer->service_type;?></td>
                      <td><?php echo $customer->unit;?></td>
                      <td><?php echo $customer->price;?></td>
                      <td><?php echo $customer->total;?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    No return policy.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo $customer->pickupdate;?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td><?php echo $customer->total;?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
             <!--  <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
            </div>
            <!-- /.invoice