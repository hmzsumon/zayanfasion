@extends('User.layouts.master')
@section('body')


@php

    $activeslider = DB::table('sliders')->orderBy('id','DESC')->first();
    $slidermore = DB::table('sliders')->orderBy('id','DESC')->skip(1)->limit(2)->get();
    $setting = DB::table('settings')->first();

@endphp

<main>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-none d-lg-block">
                @include('User.layouts.sidmenu')
            </div>
            <!----------End Sidebar-------->

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div id="carouselExampleFade" class="carousel slide carousel-fade pt-2" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="{{ $activeslider->url }}"><img class="d-block w-100 rounded" src="{{ asset('public/sliderImage') }}/{{ $activeslider->image }}" id="sliderimage"></a>
                        </div>
                        @if (isset($slidermore))
                        @foreach ($slidermore as $slidermoredata)
                        <div class="carousel-item">
                            <a href="{{ $slidermoredata->url }}">
                                <img src="{{ asset('public/sliderImage') }}/{{ $slidermoredata->image }}" class="d-block w-100 rounded banner-image">
                            </a>
                        </div>
                        @endforeach
                        @endif

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">

            <div class="head mb-4 mt-5">
                <strong>Browse all categories</strong>
            </div>

            <div class="uk-position-relative uk-visible-toggle w-100 uk-light bg-white p-4 rounded" tabindex="-1" uk-slider>
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-6@m uk-grid">

                    @php
                    $item = DB::table('product_item')->orderBy('sl','ASC')->get();
                    @endphp

                    @if(isset($item))
                    @foreach($item as $i)
                    @php
                    $item_name=str_replace(" ","-",$i->item_name)
                    @endphp
                    <li>
                        <div class="uk-panel">
                            <center>
                                <a href="{{url('item')}}/{{$item_name}}/{{$i->id}}">
                                    @if($i->image == !NULL)
                                    <img src="{{ asset('public/itemImage') }}/{{ $i->image }}" class="img-fluid" style="height:50px;">
                                    @else
                                    <img src="{{ asset('public/fontdev/') }}/img/demo.jpg" class="img-fluid">
                                    @endif

                                
                                    <div class="text-dark fw-bold">{{ $i->item_name}}</div>
                                </a>
                            </center>
                        </div>
                    </li>

                    @endforeach
                    @endif


                </ul>

                <a class="uk-position-center-left uk-position-small bg-light text-dark rounded p-2" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small bg-light text-dark rounded p-2" href="#" uk-slidenav-next uk-slider-item="next"></a>

            </div>

<!--             @php
            $offerbanner = DB::table('explore_banners')->limit(4)->get();
            @endphp

            <div class="col-md-12 mt-4">
                <div class="row">

                    @if(isset($offerbanner))
                    @foreach($offerbanner as $offer)

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <a href="{{ $offer->url }}"><img src="{{ asset('public/exploreImage') }}/{{ $offer->image }}" class="img-fluid"></a>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div> -->

            <!-- End Offer Banner -->


            @if(isset($flashdeals))
                @foreach($flashdeals as $flashdeal)
                    @php
                        $flashdeal_product = App\FlashDealProduct::where('flashdeal_id',$flashdeal->id)->get();
                    @endphp

                    @if(count($flashdeal_product)>0)
                    <div class="col-md-12 mt-5" style="background: {{ $flashdeal->background_color  }};padding: 5px;">
                        <div class="head">
                            <strong style="color: {{ $flashdeal->text_color  }}">{{ $flashdeal->title }}</strong>

                                <?php  
                                    $t1 = Carbon\Carbon::now();
                                    $t2 = $flashdeal->end_date;
                                    $diff = $t1->diff($t2);
                                ?>
                            
                                <div class="float-end">

                                        
                                    
                                    @if($diff->d > 0)
                                    <span style="color: red; font-size: 30px; font-weight: 600;">{{$diff->d}} </span>
                                    <span>/</span>
                                    @endif

                                    @if($diff->h > 0)
                                    <span  style="color: red; font-size: 30px; font-weight: 600;">{{$diff->h}} </span>
                                    <span>/ </span>
                                    @endif

                                    <span  style="color: red; font-size: 30px; font-weight: 600;">{{$diff->i}} </span>
                                    <span>/ </span>
                                    <span  style="color: red; font-size: 30px; font-weight: 600;">{{$diff->s}}</span>
                             
                                    
                                </div>

                           
                        </div>

                        <div class="uk-position-relative uk-visible-toggle w-100 py-3 rounded" tabindex="-1" uk-slider>
                            <div class="row">
                                @foreach($flashdeal_product as $p)
                                    @php
                                        $product = DB::table('product_productinfo')->where('id',$p->product_id)->orderBy('id','DESC')->first();

                                        $productname=str_replace(["%","/"," "],"-",$product->product_name);
                                    @endphp

                                    

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 mt-4" style="width: 240px;">
                                    <div class="bg-white product p-3">
                                        <center>
                                            <a href="{{ url('product') }}/{{ $productname }}/{{ $product->product_id }}"><img src="{{ asset('public/productImage') }}/{{ $product->image }}" alt=""></a>
                                            <div class="text-dark fw-bold productname mt-3 text-center">
                                                <div class="productname_height">
                                                    {{ substr($product->product_name, 0, 50) }}
                                                </div>
                                                <span>৳ {{ number_format($product->current_price, 2, '.', ',') }}</span>
                                                @if ($product->discount_price > 0)
                                                <del>৳ {{ number_format($product->sale_price, 2, '.', ',') }}</del>
                                                @endif
                                            </div>
                                            <div class="mt-2"><button class="btn btn-success btn-sm" onclick="AddCart('{{ $product->id }}')">Add To Cart</button></div>
                                        </center>
                                    </div>
                                </div>
                                
                                @endforeach



                            </div>


                        </div>


                    </div>
                    <!------------End Popular Products---------->

                    @endif

                @endforeach
            @endif
            <!---------End Flash Deal--------->









            @php
            $itemcat = DB::table('product_item')->orderBy('sl','ASC')->limit(5)->get();
            @endphp

            @if(isset($itemcat))
            @foreach($itemcat as $itemcats)
            @php
            $item_name=str_replace(" ","-",$itemcats->item_name);
            $product = DB::table('product_productinfo')->where('item_id',$itemcats->id)->where('status',1)->orderBy('id','DESC')->limit(10)->get();
            @endphp

            @if(count($product)>0)
            <div class="col-md-12 mt-5">
                <div class="head">
                    <!-- dynamic: {{ $itemcats->item_name }} -->
                    <strong>{{ $itemcats->item_name }}</strong>
                    <a href="{{url('item')}}/{{$item_name}}/{{$itemcats->id}}" class="float-end button">View All</a>
                </div>

                <div class="uk-position-relative uk-visible-toggle w-100 py-3 rounded" tabindex="-1" uk-slider>
                    <div class="row">
                        @if(isset($product))
                        @foreach($product as $p)
                        @if($p->item_id == $itemcats->id)
                        @php
                        $productname=str_replace(["%","/"," "],"-",$p->product_name)
                        @endphp

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 mt-4" style="width: 240px;">
                            <div class="bg-white product p-3">
                                <center>
                                    <a href="{{ url('product') }}/{{ $productname }}/{{ $p->product_id }}"><img src="{{ asset('public/productImage') }}/{{ $p->image }}" alt=""></a>
                                    <div class="text-dark fw-bold productname mt-3 text-center">
                                        <div class="productname_height">
                                            {{ substr($p->product_name, 0, 50) }}
                                        </div>
                                        <span>৳ {{ number_format($p->current_price, 2, '.', ',') }}</span>
                                        @if ($p->discount_price > 0)
                                        <del>৳ {{ number_format($p->sale_price, 2, '.', ',') }}</del>
                                        @endif
                                    </div>
                                    <div class="mt-2"><button class="btn btn-success btn-sm" onclick="AddCart('{{ $p->id }}')">Add To Cart</button></div>
                                </center>
                            </div>
                        </div>

                        @endif
                        @endforeach
                        @endif



                    </div>


                </div>


            </div>
            <!------------End Popular Products---------->

            @endif

            @endforeach
            @endif
        </div>
    </section>
</main>




@endsection