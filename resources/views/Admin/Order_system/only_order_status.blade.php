@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">

            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">
                    <small>Total Order Status</small>
                </h4>
              
            </div>
            
         
            <!--page title end-->


            <div class="container" style="overflow-x: scroll; max-height:726px">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                                    <span id="sms"></span>
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%;text-align:center;">
                                    <thead>
                                    <tr>
                                       <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Bill To Name</th>
                                        <th>Ship To Name</th>
                                         <th>Vessel</th>
                                        <th>Rank</th>
                                        <th>Billing Phone</th>
                                        <th>Shipping Phone</th>
                                        <th>Shipping Area</th>
                                        <th>Payment Method</th>
                                        <th>Payment Account</th>
                                        <th>Transaction ID</th>
                                       
                                        <th>SKU</th>
                                        <th>Unit Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Discount Amount</th>
                                        <th>Discounted Price</th>
                                        <th>Quantity</th>
                                        <th>Delivery Charge</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                           <th>Note</th>
                                        <th>Reject Note</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                       <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Bill To Name</th>
                                        <th>Ship To Name</th>
                                         <th>Vessel</th>
                                        <th>Rank</th>
                                        <th>Billing Phone</th>
                                        <th>Shipping Phone</th>
                                        <th>Shipping Area</th>
                                        <th>Payment Method</th>
                                        <th>Payment Account</th>
                                        <th>Transaction ID</th>
                                  
                                        <th>SKU</th>
                                        <th>Unit Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Discount Amount</th>
                                        <th>Discounted Price</th>
                                        <th>Quantity</th>
                                        <th>Delivery Charge</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Note</th>
                                        <th>Reject Note</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                        
                                        @php
                                        $product = DB::table('invoices')
                    	            ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                                    ->select('product_productinfo.product_name','product_productinfo.current_price',
                                    'product_productinfo.product_id','invoices.invoice_id',
                                    'shopping_carts.quantity')
                                    ->where('invoices.invoice_id',$showdata->invoice_id)
                                    ->get();
                                        
                                        @endphp
                                      <tr id="tr-{{$showdata->invoice_id}}">
                                        <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{$showdata->invoice_id}}</td>
                                        <td data-toggle="tooltip" title="Date">{{$showdata->created_at}}</td>
                                        <td data-toggle="tooltip" title="Bill To Name">{{$showdata->billing_name}}</td>
                                        <td data-toggle="tooltip" title="Ship To Name">{{$showdata->first_name}}&nbsp;{{$showdata->last_name}}</td>
                                        <td data-toggle="tooltip">{{$showdata->vessel_name}}</td>
                                        <td data-toggle="tooltip" >{{$showdata->rank}}</td>
                                        <td data-toggle="tooltip" title="Billing Phone">{{$showdata->billing_phone}}</td>
                                        <td data-toggle="tooltip" title="Shipping Phone">{{$showdata->phone}}</td>
                                        <td data-toggle="tooltip" title="Shipping Area">{{$showdata->district_name}},{{$showdata->thana_name}}</td>
                                        <td data-toggle="tooltip" title="Payment Method">{{$showdata->payment_type}}</td>
                                        <td data-toggle="tooltip" title="Payment Account">{{$showdata->mobile_acc}}</td>
                                        <td data-toggle="tooltip" title="Transaction ID">{{$showdata->trans_id}}</td>
                                   
                                        <td data-toggle="tooltip" title="SKU">
                                            @if($product)
                                            @foreach($product as $productdata)

                                           <li>{{$productdata->product_id}},</li>

                                            @endforeach
                                            @endif
                                            <br>
                                        
                                        </td>
                                        <td data-toggle="tooltip" title="Unit Price">{{$showdata->sale_price}}</td>
                                        <td data-toggle="tooltip" title="Discount Percentage">{{floor($showdata->discount_price/$showdata->sale_price*100)}}%</td>
                                        <td data-toggle="tooltip" title="Discount Amount">{{$showdata->discount_price}}</td>
                                        <td data-toggle="tooltip" title="Discounted Price">{{$showdata->current_price}}</td>
                                        <td data-toggle="tooltip" title="Quantity">
                                            @if($product)
                                            @foreach($product as $productdata)

                                           <li>{{$productdata->quantity}},</li>

                                            @endforeach
                                            @endif
                                            <br>
                                        
                                        </td>
                                        <td data-toggle="tooltip" title="Delivery Charge">{{$showdata->delivery_charge}}</td>
                                        <td data-toggle="tooltip" title="Discount">{{$showdata->discount}}</td>
                                        <td data-toggle="tooltip" title="Sub Total">{{$showdata->sub_total}}</td>
                                        <td data-toggle="tooltip" title="Grand Total">{{$showdata->grand_total}}</td>
                                        <td data-toggle="tooltip" title="Note">{{$showdata->note}}</td>
                                        <td data-toggle="tooltip" title="Reject Note">{{$showdata->reject_note}}</td>
                                        <td>
                                            @if($showdata->status == '0')
                                            <a class="btn btn-warning btn-sm">pending</a>
                                            @elseif($showdata->status == '1')
                                              <a class="btn btn-info btn-sm">process</a>
                                            
                                            @elseif($showdata->status == '5')
                                              <a class="btn btn-primary btn-sm">shipping</a>
                                            @elseif($showdata->status == '2')
                                              <a class="btn btn-secondary btn-sm">on the way</a>
                                            @elseif($showdata->status == '3')
                                              <a class="btn btn-success btn-sm">complete</a>
                                            @elseif($showdata->status == '6')
                                              <a class="btn btn-info btn-sm">Refound</a>
                                            @elseif($showdata->status == '4')
                                              <a class="btn btn-danger btn-sm">Reject</a>
                                             @endif
                                        </td>
                                        <td>
                                          
                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>
                                        </td>
                                    </tr>
                                         @endforeach
                                         @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- state end-->

            </div>
        </div>

@include('Admin.footer')
