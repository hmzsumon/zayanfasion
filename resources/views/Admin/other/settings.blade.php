@include('Admin.header')



<div class="main-content">
    <div class="container">

<br>
<br>
<br>
<br>
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title" style="float: left;">
                                    Setting Update
                                </div> 
                        
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('updatesetting/'. $view->id)}}" enctype="multipart/form-data">
                                    @csrf
                       

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="title" placeholder="Title"  value="{{ $view->title }}">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="address" placeholder="Address"  value="{{ $view->address ?? '' }}">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Short Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="short_des" class="form-control" rows="3">{{$view->short_des ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Delivery Charge ( Inside Dhaka )</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control"  name="inside_dhaka"   value="{{ $view->inside_dhaka }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Delivery Charge ( Outside Dhaka )</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control"  name="outside_dhaka"   value="{{ $view->outside_dhaka }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Hotline</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="hotline" placeholder="Hotline"  value="{{ $view->hotline }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="email" placeholder="Email"  value="{{ $view->email }}">
                                        </div>
                                    </div>


                                      <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Facebook</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="facebook" placeholder="Facebook"  value="{{ $view->facebook }}">
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Twitter</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="twitter" placeholder="Twitter"  value="{{ $view->twitter }}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Instragram</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="instragram" placeholder="Instragram"  value="{{ $view->instragram }}">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Youtube</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="youtube" placeholder="Youtube"  value="{{ $view->youtube }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Logo</label>
                                        <div class="col-sm-6">
                                            @php
                                             $path= base_path().'/public/categoryImage/'.$view->logo;
                                            @endphp
                                            @if($view->logo)
                                            <img src="{{asset('/public/siteImage')}}/{{$view->logo}}" alt="">
                                            @endif

                                            <input type="file" class="form-control"  name="logo">
                                            <span>Size: 224*50px</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Favicon</label>
                                        <div class="col-sm-6">
                                            @php
                                             $path= base_path().'/public/categoryImage/'.$view->favicon;
                                            @endphp
                                            @if($view->favicon)
                                            <img src="{{asset('/public/siteImage')}}/{{$view->favicon}}" alt="">
                                            @endif

                                            <input type="file" class="form-control"  name="favicon">
                                            <span>Size: 16*16px</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Call For Order Image</label>
                                        <div class="col-sm-6">
                                            @php
                                             $path= base_path().'/public/callForOrderImage/'.$view->call_for_order_image;
                                            @endphp
                                            @if($view->call_for_order_image)
                                            <img src="{{asset('/public/callForOrderImage')}}/{{$view->call_for_order_image}}" alt="">
                                            @endif

                                            <input type="file" class="form-control"  name="call_for_order_image">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Number 1</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control"  name="number_1" placeholder="Number 1"  value="{{ $view->number_1 }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Number 2</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control"  name="number_2" placeholder="Number 2"  value="{{ $view->number_2 }}">
                                        </div>
                                    </div>
                                    
                                    <h3>API</h3><hr>
                                    
                                        <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">API url</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="api_url"  value="{{ $view->api_url }}">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">API Key</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="api_key"  value="{{ $view->api_key }}">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Sender ID</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="senderid"  value="{{ $view->senderid }}">
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>







    </div>
</div>








@include('Admin.footer')
<script type="text/javascript">
      function check_all()
      {
      
      if($('#chkbx_all').is(':checked')){
        $('input.check_elmnt2').prop('disabled', false);
        $('input.check_elmnt').prop('checked', true);
        $('input.check_elmnt2').prop('checked', true);
      }else{
        $('input.check_elmnt2').prop('disabled', true);
        $('input.check_elmnt').prop('checked', false);
        $('input.check_elmnt2').prop('checked', false);
        }
    } 
    

    function chekMain(getID){
       
          if($('#linkID-'+getID).is(':checked')){
              
            $("input#sublinkID-"+getID).attr('disabled', false);
            $("input#sublinkID-"+getID).attr('checked', true);
          
          }else{
            $("input#sublinkID-"+getID).attr('disabled', true);
            $("input#sublinkID-"+getID).attr('checked', false);
          
          }
      
        }


</script>