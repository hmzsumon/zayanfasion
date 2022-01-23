

<!-- <center>
  <div id="myBtns">
    <a href="#" class="text-danger" uk-toggle="target: #offcanvas-none">
        <br>
      <div><strong id="cartamount"></strong> Tk</div>
    </a>
  </div>
</center>
 -->


<style>

#myBtns {
  position: fixed; /* Fixed/sticky position */
  bottom: 300px; /* Place the button at the bottom of the page */
  right: 0px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  color: red; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 10px 20px; /* Some padding */
  font-size: 20px; /* Increase font size */
  font-weight: bold;
  transition: 0.5s;
  background: url("{{ asset('public/fontdev/dummy-cart.webp') }}");
  background-position:center;
  background-repeat:no-repeat;
  background-size:cover;
  border-radius: 5px 0px 0px 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

#myBtns:hover {
  opacity: 1;
  text-decoration: none;
}

.footermenu li {
    display: inline-block;
    padding-right: 10px;
    padding-left: 10px;
    border-right: 1px solid gray;

}

.footermenu li a {
    color: gray;
    font-size: 14px;
}

.footer_bottom {
    font-size: 1.4rem;
    border-top: 2px solid gray;
}
.footer_bottom  i {
    cursor: pointer;
}


</style>





<?php

    $setting = DB::table('settings')->first();

?>



<footer>
    <div class="p-3 footermenu p-md-5 ">
        <div class="container">
            <div class="justify-between row d-flex align-items-center ">
                <div class="col-md-5 col-sm-4 ">
                    <!-- // -->
                    <div class="footer-logo ">
                        <!-- <strong>POPULAR SEARCHES</strong><br><br> -->
                        <a href="{{ url('/') }}"><img src="{{asset('/public/siteImage')}}/{{$setting->logo}}" class="img-fluid"
                        ></a>
                        <p>{{$setting->short_des ?? ''}}</p>
                    </div>
                </div>
                <div class=" col col-md-7 d-md-flex justify-content-between">
                    <div class="col-md-3 col-sm-4">
                        <strong class="text-white">Contact Us</strong><br><br>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{$setting->address ?? ''}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="fas fa-phone-volume"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a class="text-white" href="tel:{{$setting->hotline}}">{{$setting->hotline}}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a class="text-white" href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pb-5 col-md-4 pb-md-0 ">
                        <div class="social-media d-flex justify-content-between d-md-block">

                            @if($setting->facebook)
                            <a href="{{$setting->facebook}}" target="_blank" class="social-media__item">
                                <div class="social-media__icon facebook"><i class="fab fa-facebook-f"></i></div>
                                <div class="social-media__text d-none d-md-block">Facebook</div>
                            </a>
                            @endif

                            @if($setting->twitter)
                            <a href="{{$setting->twitter}}" target="_blank" class="social-media__item">
                                <div class="social-media__icon twitter"><i class="fab fa-twitter"></i></div>
                                <div class="social-media__text d-none d-md-block">Twitter</div>
                            </a>
                            @endif

                            @if($setting->instragram)
                            <a href="{{$setting->instragram}}" target="_blank" class="social-media__item">
                                <div class="social-media__icon linkedin"><i class="fab fa-instagram"></i></div>
                                <div class="social-media__text d-none d-md-block">Instagram</div>
                            </a>
                            @endif

                            @if($setting->youtube)
                            <a href="{{$setting->youtube}}" target="_blank" class="social-media__item">
                                <div class="social-media__icon youtube"><i class="fab fa-youtube"></i></div>
                                <div class="social-media__text d-none d-md-block">Youtube Channel</div>
                            </a>
                            @endif

                            @if($setting->email)
                            <a href="{{$setting->email}}" target="_blank" class="social-media__item">
                                <div class="social-media__icon google"><i class="fas fa-envelope"></i></div>
                                <div class="social-media__text d-none d-md-block">Email</div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- copyright -->
    <!-- <div class="py-4 text-center text-light" style="background: #1e1e1e;">Copyright &copy 2021 Shopritefoodbd.com All Right Reserved <a href="https://branexit.com/" style="color: #F8432B;">Branexit</a></div> -->
<div class="bg-white d-md-none fixed-bottom text-dark footer_bottom">
    <div class="p-3 d-flex justify-content-around">
        <i class="fas fa-home"></i>
        <i class="fas fa-shopping-cart"></i>
        <i class="fas fa-id-card-alt"></i>
    </div>
</div>

</footer>



<div id="offcanvas-none" uk-offcanvas="mode: slide; overlay:true; flip: true;">

    <div class="uk-offcanvas-bar cartbackground">

        <div class="card">

            <div class="bg-white card-header">

                <div class="row">
                    <div class="col-md-6 col-6">
                        My Cart
                    </div>
                    <div class="col-md-6 col-6">
                        <span uk-icon="icon:close; ratio:1.2"
                        class="uk-offcanvas-close icone"></span>
                    </div>
                </div>

            </div>




            <div class="p-0 card-body">

               <div id="cartshow"></div>







                <div class="mt-3 card-footer" style="position: absolute; bottom: 0; width: 100%;">


                    <div class="mt-2 row">
                        <div class="col-md-6 col-6">
                            Total
                        </div>

                        <div class="col-md-6 col-6 text-end">
                            ৳ <strong id="cartprice">0</strong>
                        </div>
                    </div>

                    <br>

                    @if (Auth('guest')->user())
                    <a href="{{ url('/Checkout') }}" class="btn btn-dark d-block"><i class="fa fa-shopping-basket" uk-tooltip="title: Remove; pos:bottom"></i>&nbsp;Checkout Order</a>
                    @else
                    <a href="{{ url('/user-login') }}" class="btn btn-dark d-block"><i class="fa fa-user" uk-tooltip="title: Remove; pos:bottom"></i>&nbsp;Login Account</a>
                    @endif

                    <br><br>


                </div>

            </div>

        </div>

    </div>
</div>
</div><!----------End side Cart-------->




<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eff60d26f9c1b7b"></script>

<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/uikit.min.js"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/uikit-icons.min.js"></script>
<script type="text/javascript" src="{{ asset('public/assets/') }}/js/slick.min.js"></script>



<script src="{{ asset('public/assets/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/fontdev/') }}/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            loadingHtml: `<center><img class="mt-5" src="{{ asset('public/Frontend/img/loader.gif') }}" style="height:50px;"></center>`,
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if (Session::has('messege'))

    var type="{{ Session::get('alert-type', 'info') }}"

    switch(type){

        case 'info':
        toastr.options.positionClass = 'toast-bottom-center';
        toastr.info("{{ Session::get('messege') }}");

        break;

        case 'success':
        toastr.options.positionClass = 'toast-bottom-center';
        toastr.success("{{ Session::get('messege') }}");

        break;

        case 'warning':
        toastr.options.positionClass = 'toast-bottom-center';
        toastr.warning("{{ Session::get('messege') }}");

        break;

        case 'error':
        toastr.options.positionClass = 'toast-bottom-center';
        toastr.error("{{ Session::get('messege') }}");

        break;

    }

    @endif


    $(document).ready(function() {


        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;

            $input.val(count);
            $input.change();

            return false;

        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });


    $('.select_color').on('click', function(e) {

        var $this = $(this);
        var id = $(this).data('id');
        $("#customer_selected_color").val($this.text());
        $(".select_color").removeClass("selected_color");
        $(this).addClass("selected_color");


    });


    $('.select_size').on('click', function(e) {

        var $this = $(this);
        var id = $(this).data('id');
        $("#customer_selected_size").val($this.text());
        console.log($this)
        $(".select_size").removeClass("selected_size");
        $(this).addClass("selected_size");

    })

    $(document).ready(function() {
        $('.summernote').summernote({
          toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'clear']],


            ['picture', ['picture']],
          ]
        });
    });


</script>


</body>
</html>
