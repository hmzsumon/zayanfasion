@extends('User.layouts.master')
@section('body')


<div class="col-md-12">
  <div class="container">
    <div class="row">


      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5">
        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 mt-4">
          <div class="col-md-12 p-4 pb-5 formback">
            <center><strong>Login</strong><br><span>Login your account Thank You !!</span></center>
            <hr>

            <form method="post" action="{{url('/guest-login')}}">
              @csrf
              <div class="form-group col-md-12 mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control textfill" name="email" placeholder="Mobile" required="" @if(Cookie::has('user')) value="{{Cookie::get('user')}}" @endif>
              </div>

              <div class="form-group col-md-12 mb-3">
                <label>Password</label>
                <input type="Password" class="form-control textfill" name="password" placeholder="Password" required="" @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
              </div>

              <div class="col-md-12 mt-2 mb-3">
                <button class="btn btn-success d-block w-100 p-2">LOGIN</button>
              </div>
            </form>

            <br>
            <center>
              <span>Don't have an account? <a href="{{ url('/user-Register') }}" class="text-success">Register</a></span><br>
              <a href="{{ url('/forgot_password') }}" class="text-warning">Forget Password</a>
            </center>



          </div>
        </div>



      </div>

      
    </div>
  </div>
</div>






@endsection
