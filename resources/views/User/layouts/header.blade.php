
@php
$setting = DB::table('settings')->first();
@endphp


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{  $setting->title }}</title>

  <link rel="shortcut icon" href="{{asset('/public/siteImage')}}/{{$setting->favicon}}" class="img-fluid">

  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/css/uikit.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/style.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev') }}/css/toast.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  
</head>
<body onload="myfunctions();" id="body">
  <div id="load"></div>

  <div uk-sticky>
    <div class="col-md-12 topbar pt-2 pb-2 d-none d-lg-block">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">
            <span><i class="bi bi-phone"></i>&nbsp;&nbsp;{{  $setting->hotline }}</span>
            &nbsp;&nbsp;&nbsp;
            <span><i class="bi bi-envelope-fill"></i>&nbsp;&nbsp;{{  $setting->email }}</span>


          </div>
          <div class="col">
            <div class="float-end">
             <li><a href="{{ url('user-login') }}" title="Login">Login</a></li>
             <li><a href="{{ url('user-Register') }}" title="Register">Register</a></li>
             <li><a href="{{ url('howtobuys') }}">How to Buy</a></li>
              <li><a href="{{ url('privacy_policys') }}" >Privacy And Policy</a></li>
           </div>


         </div>
       </div>
     </div>
   </div><!---------End Topbar------->

   <div class="col-md-12 menubarsection pb-2">
     <div class="container">
      <div class="row align-items-center">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-7 order-1 ">
         <a href="{{ url('/') }}"><img src="{{asset('/public/siteImage')}}/{{$setting->logo}}" class="img-fluid"></a>
          <!-- <span class="text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">&nbsp;&nbsp;<i class="bi bi-geo-alt-fill"></i>&nbsp;&nbsp;@if(isset($getlocation)){{ $getlocation }}@else Chattogram @endif</span> -->
       </div>

       <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 order-3">
        <form method="get" action="{{ url('/searchproducts') }}">
          @csrf
          <div class="input-group">
           <input type="text" class="form-control" id="searchbox" placeholder="What are you looking for?" name="search"  autocomplete="off" required="" onkeyup="Searchproduct();">
           <div class="input-group-append">
            <button class="btn" type="submit" ><i class="bi bi-search"></i></button>
          </div>
        </div>
      </form>
      <div id="searchdata"></div>
    </div>


    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-5 order-2 order-md-3">
     <div class="float-end text-dark">
       <span type="button" class="position-relative" uk-toggle="target: #offcanvas-none">
        <i class="bi bi-cart3 text-dark"></i>
        <span class="position-absolute top-0 start-120 translate-middle badge rounded-pill bg-warning">
          <span id="cartqunt">0</span>
        </span>
      </span>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      @if(Auth('guest')->user())
      <a href="{{ url('userdashboard') }}" class="text-dark"><i class="bi bi-person-circle text-dark"></i>&nbsp;&nbsp;</a>
      @else
      <a href="{{ url('user-login') }}" class="text-dark"><i class="bi bi-person-circle text-dark"></i>&nbsp;&nbsp;</a>
      @endif
      &nbsp;&nbsp;
       <span class="text2" data-bs-toggle="offcanvas"  data-bs-target="#offcanvasRight"><i class="bi bi-list text-dark" ></i></span>
    </div>
  </div>


</div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <center>
          <strong>
            <h1><i class="bi bi-compass"></i></h1>
            SELECT YOUR DELIVERY LOCATION
          </strong>

          <form class="mt-4 formback p-3" method="get" action="{{ url('/Location') }}">
            @csrf
            <div class="row align-items-center">
              <div class="form-group col-md-4">
                <select class="form-control textfill">
                  <option>Select City</option>
                  <option value="Chattogram">Chattogram</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <select class="form-control textfill" name="area">
                  <option>Select Area</option>
                  <option value="Sea Beach">Sea Beach</option>
                  <option value="Chorpara">Chorpara</option>
                  <option value="Jele Para">Jele Para</option>
                  <option value="Alpha">Alpha</option>
                  <option value="C-Anchorage">C-Anchorage</option>
                  <option value="B-Anchorage">B-Anchorage</option>
                  <option value="karnaphuli">karnaphuli</option>
                </select>
              </div>
              <div class="form-group col-md-4">
               <input type="submit" name="" class="btn btn-success btn-sm w-100 rounded">
             </div>
           </div>
         </form>
       </center>

     </div>

   </div>
 </div>
</div>










<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <span>Categories</span>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body sidemenu p-0">
    	<ul class="uk-nav-parent-icon" uk-nav duration='800'>



		@php
		$item = DB::table('product_item')->orderBy('sl','ASC')->get();
		$category = DB::table('product_category')->get();
		@endphp


		@if(isset($item))
		@foreach($item as $i)
		@php
		$item_name=str_replace(" ","-",$i->item_name)
		@endphp

		<li class="uk-parent">
			<a href="{{url('item')}}/{{$item_name}}/{{$i->id}}"><img src="{{ asset('public/itemImage') }}/{{ $i->image }}" class="img-fluid">&nbsp;&nbsp;{{ $i->item_name }}</a>
			<ul class="uk-nav-sub">
				@if(isset($category))
				@foreach($category as $cat)
				@if($cat->item_id == $i->id)
				@php
				$category_name=str_replace(" ","-",$cat->category_name)
				@endphp
				<li><a href="{{url('category')}}/{{$category_name}}/{{$cat->id}}">{{ $cat->category_name }}</a></li>
				@endif
				@endforeach
				@endif
			</ul>
		</li>

		@endforeach
		@endif

<!-- 
			<li><a href="{{ url('hugesaving') }}"><img src="{{ asset('public/fontdev/') }}/img/i1.webp" class="img-fluid">&nbsp;&nbsp;Huge Saving</a></li>
		<li><a href="{{ url('ordersavemore') }}"><img src="{{ asset('public/fontdev/') }}/img/i2.webp" class="img-fluid">&nbsp;&nbsp;Order more save more</a></li>
		<li><a href="{{ url('dicountoffer') }}"><img src="{{ asset('public/fontdev/') }}/img/i3.webp" class="img-fluid">&nbsp;&nbsp;Special Discount </a></li>
		<li><a href="{{ url('buyget') }}"><img src="{{ asset('public/fontdev/') }}/img/i4.webp" class="img-fluid">&nbsp;&nbsp;Buy 1 get 1 offers</a></li>
		<li><a href="{{ url('specialservices') }}"><img src="{{ asset('public/fontdev/') }}/img/i10.webp" class="img-fluid">&nbsp;&nbsp;Our special discount  offers</a></li> -->


		<!-- <div style="height: 150px;"></div> -->



	</ul>

  </div>
</div>










<script type="text/javascript">

  function Searchproduct()

  {

    var search = $("#searchbox").val();

    if(search != '')

    {

      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("Searchproduct") }}',
        type: 'POST',
        data: {search:search},
        success: function(data)
        {
          $('#searchdata').html(data);

        }

      })
    }

    else

    {
      $('#searchdata').html('');

    }

  }

</script>
