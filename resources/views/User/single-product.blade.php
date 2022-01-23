<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="Article">
<meta property="og:title" content="{{ $viewproduct->product_name }}">
<meta property="og:description" content="{{ $viewproduct->product_name }}">
<meta property="og:image" content="{{ url('/public/productImage') }}/{{ $viewproduct->image }}" />

@extends('User.layouts.master')
@section('body')


@php
$setting = DB::table('settings')->first();
@endphp

<style>
    .minus, .plus{
        width:20px;
        height:20px;
        background:#f2f2f2;
        border-radius:4px;
        padding:8px 5px 8px 5px;
        border:1px solid #ddd;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        height: 42px;
        width: 42px;
    }

    input{
        height:42px;
        width: 100px;
        text-align: center;
        font-size: 26px;
        border:1px solid #ddd;
        border-radius:4px;
        display: inline-block;
        vertical-align: middle;
    }

    .select_color{
        padding: 6px;
        border: 1px solid #c4c4c4;
        text-align: center;
        cursor: pointer;
        font-weight: 800;
    }

    .selected_color{
        padding: 6px;
        border: 2px solid red !important;
        text-align: center;
        ursor: pointer;
        font-weight: 800;
    }

    .select_size{
        padding: 6px;
        border: 1px solid #c4c4c4;
        text-align: center;
        cursor: pointer;
        font-weight: 800;
    }

    .selected_size{
        padding: 6px;
        border: 2px solid red !important;
        text-align: center;
        ursor: pointer;
        font-weight: 800;
    }

</style>


<div class="col-md-12">
    <div class="container">
        <div class="row">


            <!----------End Sidebar-------->

            <div class="pb-5 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="p-3 mt-3 bg-white col-md-12 breadcumbs">
                    <li><a href="{{ url('/') }}"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;Home</a></li>
                    <li><i class="bi bi-chevron-right"></i></li>
                    <li>{{ $viewproduct->product_name }}</li>
                </div>


                <div class="p-3 pb-4 mt-4 bg-white rounded col-md-12 single p-lg-0">
                    <div class="row">
                        <div class="p-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                            <div class="simpleLens-gallery-container" id="demo-1">
                                <!-- zakaria -->
                                <div class="border simpleLens-container" style="width: 100%;">
                                    <div class="p-2 simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lens-image="{{ asset('public/productImage') }}/{{ $viewproduct->image }}">
                                            <img src="{{ asset('public/productImage') }}/{{ $viewproduct->image }}" class="simpleLens-big-image product-image-zoom">
                                        </a>

                                    </div>
                                </div>

                                <div class="product-thumb-gallery bg-info">
                                    @foreach($product_image as $img)
                                    <div class="product-thumb-gallery-item">
                                        <!-- <img src="{{ asset('public/productImage') }}/{{ $viewproduct->image }}" alt=""> -->
                                        <img src="{{asset('/public/productImage')}}/{{$img->image}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <br>
                            <strong>{{ $viewproduct->product_name }}</strong><br>
                            <span><b>SKU:</b> {{ $viewproduct->product_id }}</span><br>
                            @if($viewproduct->stock_status == 1)
                            <span class="rounded bg-success text-light" style="padding: 2px 10px; font-size: 13px;">Stock Available</span>
                            @else
                            <span class="rounded bg-danger text-light" style="padding: 2px 10px; font-size: 13px;">Stock Out</span>
                            @endif
                            <br><br>

                            <label>৳ {{ number_format($viewproduct->current_price, 2, '.', ',') }}</label>

                            @if ($viewproduct->discount_price > 0)
                            <del>৳ {{ number_format($viewproduct->sale_price, 2, '.', ',') }}</del>
                            @endif
                            <br>

                            @if(count($product_color)>0)
                            <div class="mt-3 mb-3 color_select">
                                <div class="row" style="padding-right: 40px;">
                                    <div class="col-md-12">
                                        <p style="margin: 0"><b>Color : </b></p>
                                        <div class="mt-2 row">
                                            @foreach($product_color as $color)
                                            <div class="col-md-2">
                                                <div class="select_color" data-id="{{ $color->id }}">{{$color->color}}</div>
                                            </div>
                                            @endforeach
                                            <input  type="hidden" name="color" id="customer_selected_color" style="text-align: left;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(count($product_size)>0)
                            <div class="mt-3 mb-3 color_select">
                                <div class="row" style="padding-right: 40px;">
                                    <div class="col-md-12">
                                        <p style="margin: 0"><b>Size : </b></p>
                                        <div class="mt-2 row">
                                            @foreach($product_size as $size)
                                            <div class="col-md-2">
                                                <div class="select_size"  data-id="{{ $size->id }}" style="padding: 6px;border: 1px solid #c4c4c4;text-align: center;cursor: pointer;">{{$size->size}}</div>
                                            </div>
                                            @endforeach
                                            <input  type="hidden" name="size" id="customer_selected_size" style="text-align: left;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                                <img src="{{asset('/public/callForOrderImage')}}/{{$setting->call_for_order_image}}" alt="" style="margin-top: 16px;">
                                <br>
                                <h4 style="margin:0;font-weight: bolder;display: inline-block;font-family: 'bootstrap-icons';color: #828282;font-size: 25px;">Call For Order</h4>

                                <p class="mt-2" style="margin: 0;font-size: 19px;font-weight: 600;">{{ $setting->number_1 ?? '' }}</p>
                                <p style="margin: 0;font-size: 19px;font-weight: 600;">{{ $setting->number_2 ?? '' }}</p>

                                <h5 style="margin:0;margin-top: 20px;"><b>Delivery Charge: Inside Dhaka - {{$setting->inside_dhaka ?? ''}} Tk. / Outside Dhaka - {{$setting->outside_dhaka ?? ''}} Tk.</b></h5>



                                <div class="mt-5 quentity">
                                    <label>Quantity</label><br>
                                    <!-- <input type="number" min="{{ $viewproduct->min_qunt }}" name="Quantity-{{ $viewproduct->id }}" id="Quantity-{{ $viewproduct->id }}" value="{{ $viewproduct->min_qunt }}"> -->

                                    <div class="number">
                                        <span class="minus">-</span>

                                        <input type="label" class="quantity" min="{{ $viewproduct->min_qunt }}" name="Quantity-{{ $viewproduct->id }}" id="Quantity-{{ $viewproduct->id }}" value="{{ $viewproduct->min_qunt }}"/>
                                        <span class="plus">+</span>

                                    </div>

                                </div>

                                <div class="mt-5">
                                    <div class="col-md-12" style="padding-right: 20px;">
                                        <div class="row">
                                            <div class="mb-2 col-md-6">
                                                @if (Auth('guest')->user())
                                                <a href="{{ url('/Checkout') }}"><button class="cart w-100" style="background: #1b99bf;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Buy Now</button></a>
                                                @else
                                                <a href="{{ url('/user-login') }}"><button class="cart w-100" style="background: #1b99bf;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Buy Now</button></a>
                                                @endif
                                            </div>
                                            <div class="col-md-6">

                                                @if($viewproduct->stock_status == 1)
                                                <button class="cart w-100" onclick="AddCart('{{ $viewproduct->id }}')"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add To Cart</button>
                                                @else
                                                <button class="cart w-100" style="cursor: not-allowed;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add To Cart</button>
                                                @endif

                                            </div>

                                        </div>


                                    </div>
                                </div>


                            <div class="mt-4">
                                <span>Share With :</span><br>
                                <div class="addthis_inline_share_toolbox_0v9d"></div>

                            </div>


                        </div>



                    </div>
                </div>
                <!--------------End Product's--------------------->





                <div class="p-0 p-4 mt-4 bg-white col-md-12 details">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a href="#Description" class="nav-link active" data-bs-toggle="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#Review" class="nav-link" data-bs-toggle="tab">Review</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Description">
                            <h4 class="mt-2">{{ $viewproduct->product_name }}</h4>
                            <p>{!! $viewproduct->product_details !!}</p>
                        </div>

                        <div class="tab-pane fade" id="Review">
                            <div class="rating_details" style="border-bottom: 1px solid #dedede; padding: 25px;">
                                <div class="row">

                                    <div class="col-md-6" style="text-align: center;">
                                        @if($avg_rating > 0)
                                        <h1 style="margin: 0;">{{ substr($avg_rating, 0, 3) }}</h1>
                                        @else
                                        <h1 style="margin: 0;">0</h1>
                                        @endif

                                        @if($avg_rating == 5)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                        @elseif($avg_rating >= 4)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif($avg_rating >= 3)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif($avg_rating >= 2)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif($avg_rating >= 1)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @else
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @endif

                                        <p style="margin: 0;">Average Rating based on {{$total_rating ?? 0}} reviews.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                          <div class="side">
                                            <div>5 star</div>
                                          </div>
                                          <div class="middle">
                                            <div class="bar-container">
                                              <div class="bar-5" style="width: {{$five_star ?? 0}}%;"></div>
                                            </div>
                                          </div>
                                          <div class="side right">
                                            <div>{{$five_star ?? 0}}</div>
                                          </div>
                                          <div class="side">
                                            <div>4 star</div>
                                          </div>
                                          <div class="middle">
                                            <div class="bar-container">
                                              <div class="bar-4" style="width: {{$four_star ?? 0}}%; "></div>
                                            </div>
                                          </div>
                                          <div class="side right">
                                            <div>{{$four_star ?? 0}}</div>
                                          </div>
                                          <div class="side">
                                            <div>3 star</div>
                                          </div>
                                          <div class="middle">
                                            <div class="bar-container">
                                              <div class="bar-3" style="width: {{$three_star ?? 0}}%;"></div>
                                            </div>
                                          </div>
                                          <div class="side right">
                                            <div>{{$three_star ?? 0}}</div>
                                          </div>
                                          <div class="side">
                                            <div>2 star</div>
                                          </div>
                                          <div class="middle">
                                            <div class="bar-container">
                                              <div class="bar-2" style="width: {{$two_star ?? 0}}%; "></div>
                                            </div>
                                          </div>
                                          <div class="side right">
                                            <div>{{$two_star ?? 0}}</div>
                                          </div>
                                          <div class="side">
                                            <div>1 star</div>
                                          </div>
                                          <div class="middle">
                                            <div class="bar-container">
                                              <div class="bar-1" style="width: {{$one_star ?? 0}}%; "></div>
                                            </div>
                                          </div>
                                          <div class="side right">
                                            <div>{{$one_star ?? 0}}</div>
                                          </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    @if(count($product_ratings)>0)
                                        @foreach($product_ratings as $product_rating)
                                        <?php
                                            $guest = DB::table('guest')->where('id', $product_rating->guest_id)->first();
                                        ?>
                                        <div class="comments" style="padding: 14px;padding: 14px;border: 1px solid #e4e4e4;">

                                            <h4 style="margin:0;color: darkgreen;font-weight: bold;font-size: 17px;">{{$guest->first_name}}
                                            (

                                                @if($product_rating->guest_rating == 5)
                                                    <span class="fa fa-star checked" style="color: orange;"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                @elseif($product_rating->guest_rating >= 4)
                                                    <span class="fa fa-star checked" style="color: orange;"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($product_rating->guest_rating >= 3)
                                                    <span class="fa fa-star checked" style="color: orange;"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($product_rating->guest_rating >= 2)
                                                    <span class="fa fa-star checked" style="color: orange;"></span>
                                                    <span class="fa fa-star checked" style="color: orange"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($product_rating->guest_rating >= 1)
                                                    <span class="fa fa-star checked" style="color: orange;"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @else
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @endif

                                            ) </h4>

                                            <p style="margin:0;font-size: 14px;color: #6e6e6e;">{!! $product_rating->comment !!} </p>

                                        </div>
                                        @endforeach
                                    @else
                                        <p style="text-align: center; margin-top: 2rem;font-size: 18px;font-weight: 700;">No Rating Yet</p>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <div style="border-left: 1px solid #f4eaea; padding: 10px;">
                                        <h4 class="mt-2"><strong>Write Your Review</strong></h4>
                                        @if(Session::has('feedback_submited'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('feedback_submited') }}</p>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                              <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                              </ul>
                                            </div>
                                            @endif

                                        @if(Auth('guest')->user())
                                        <form action="{{ route('submit-feedback') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $viewproduct->product_id }}">
                                            <input type="hidden" name="guest_id" value="{{ Auth('guest')->id() }}">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Rating</label>
                                                <select name="guest_rating" id="" class="form-control" style="color: #ff9f06;font-weight: bolder;" required="">
                                                    <option value="5">★★★★★</option>
                                                    <option value="4">★★★★</option>
                                                    <option value="3">★★★</option>
                                                    <option value="2">★★</option>
                                                    <option value="1">★</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Comment</label>
                                                <textarea name="comment" class="form-control summernote" rows="3" required=""></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-warning text-light">Submit</button>
                                        </form>
                                        @else

                                        <a href="{{ url('user-login') }}" class="text-dark"><button type="submit" class="btn btn-warning text-light">Login</button></a>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>




                <div class="mt-5 col-md-12 cathead">
                    <strong>Related Products</strong>
                    <div class="row">

                        @if (isset($related_product))
                        @foreach ($related_product as $r)
                        @php
                        $productname = str_replace(['%', '/', ' '], '-', $r->product_name);
                        @endphp



                        <div class="mt-4 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                            <div class="p-3 bg-white product">
                                <center>
                                    <a href="{{ url('product') }}/{{ $productname }}/{{ $r->product_id }}"><img src="{{ asset('public/productImage') }}/{{ $r->image }}" alt=""></a>
                                    <div class="mt-3 text-center text-dark fw-bold productname">

                                        <div class="productname_height">
                                            {{ substr($r->product_name, 0, 50) }}
                                        </div>

                                        <span>৳ {{ $r->current_price }}</span></div>
                                    <div class="mt-2"><button class="btn btn-success btn-sm" onclick="AddCart('{{ $r->id }}')">Add To Cart</button></div>
                                </center>
                            </div>
                        </div>


                        @endforeach
                        @endif






                    </div>
                </div>





            </div>


        </div>
    </div>
</div>









@endsection
