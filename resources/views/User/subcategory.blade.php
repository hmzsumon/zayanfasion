@extends('User.layouts.master')
@section('body')





<div class="col-md-12 pt-3 pb-2 bg-white">
	<div class="container">

		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{  url('/') }}">Home</a></li>
				<li><span>{{$subcategory->subcategory_name}}</span></li>
			</ul>
		</div>


	</div>
</div>


@if(count($product_cat)>0)

<div class="col-md-12">
	<div class="container padd">

		<div class="scrolling-pagination">
			<div class="row padd">


				
				@foreach($product_cat as $s)
				@php 
				$productname=str_replace(["%","/"," "],"-",$s->product_name)
				@endphp

				<div class="col-xl-2 col-lg-4 col-md-6 col-sm-4 col-6 mt-4">
					@if($s->discount_per>0)
					<div class="overlay p-2">
						<span>{{ -intval($s->discount_per) }} %</span>
					</div>

					@endif
					<div class="products2">
						<a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}">
							<center><img class="img-fluid" src="{{asset('public/productImage')}}/{{$s->image}}"></center>
							<br>
							{{ substr($s->product_name, 0,50) }}...<br>
							<strong>&#2547;&nbsp;{{$s->current_price}}</strong>
							&nbsp;
							@if($s->discount_price>0)
							<del>&#2547;&nbsp;{{$s->sale_price}}</del>
							@endif
						</a>
					</div>
				</div>


				@endforeach
			



			</div>


			<div class="mt-5 float-right">
				{{ $product_cat->links() }}
			</div>

		</div>



	</div>
</div><!--------------End Category Product's--------------------->

@else

<div class="col-md-12 pt-5 pb-5 bg-white">
	<div class="container padd">

		<center><img src="{{ asset('public/Frontend/img/no-order.svg') }}" class="img-fluid"><br>
			<strong class="text-dark">Product Not Found</strong>
		</center>

	</div>
</div>


@endif






@endsection