<x-app-layout>
<div class="container">
    <section class="section">
        <div class="section-body">
          <div class="invoice">
            <div class="invoice-print">
              <div class="row">
                <div class="col-lg-12">
                  <div class="invoice-title">
                    <h2>Invoice</h2>
                    <div class="invoice-number">Order #{{$order->id}}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <address>
                        <strong>Billed To:</strong><br>
                        {{$order->customer->name}}<br>
                        {{$order->customer->address}}
                      </address>
                    </div>
                    <div class="col-md-6 text-md-right">
                      <address>
                        <strong>Shipped To:</strong><br>
                        Keith Johnson<br>
                        197 N 2000th E<br>
                        Rexburg, ID,<br>
                        Springfield Center, USA
                      </address>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 5687<br>
                        {{$order->customer->email}}
                      </address>
                    </div>
                    <div class="col-md-6 text-md-right">
                      <address>
                        <strong>Order Date:</strong><br>
                        {{date('F j,Y',strtotime($order->created_at))}}<br><br>
                      </address>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-12">
                  <div class="section-title">Order Summary</div>
                  <p class="section-lead">All items here cannot be deleted.</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                     <thead>
                        <tr>
                            <th data-width="40" style="width: 40px;">#</th>
                            <th>Item</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Totals</th>
                          </tr>
                     </thead>
                    <tbody>
                       @foreach ($order-> bill_descriptions as $index => $product)
                       <tr>
                        <td>{{++$index}}</td>
                        <td>{{$product->product->name}}</td>
                        <td class="text-center">{{$product->product->sale_price}}</td>
                        <td class="text-center">{{$product->qty}}</td>
                        <td class="text-right">{{$product->amount}}</td>
                      </tr>
                       @endforeach

                    </tbody>
                    </table>
                  </div>
                  <div class="row mt-4">
                    <div class="col-lg-8">
                      <div class="section-title">Payment Method</div>
                      <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                        invoices.</p>
                      <div class="images">
                        <img src="/assets/img/cards/visa.png" alt="visa">
                        <img src="/assets/img/cards/jcb.png" alt="jcb">
                        <img src="/assets/img/cards/mastercard.png" alt="mastercard">
                        <img src="/assets/img/cards/paypal.png" alt="paypal">
                      </div>
                    </div>
                    <div class="col-lg-4 text-right">
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Subtotal</div>
                        <div class="invoice-detail-value">{{$order->total}}</div>
                      </div>
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Shipping</div>
                        <div class="invoice-detail-value">$15</div>
                      </div>
                      <hr class="mt-2 mb-2">
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Total</div>
                        <div class="invoice-detail-value invoice-detail-value-lg">{{$order->total}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="text-md-right">
              <div class="float-lg-left mb-lg-0 mb-3">
                <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process
                  Payment</button>
                <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
              </div>
              <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
            </div>
          </div>
        </div>
      </section>
</div>
</x-app-layout>
