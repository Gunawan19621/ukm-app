@extends('auth.layouts.main')
@section('success-register')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
          <div class="card">
             <div class="card-header">Successfully registered</div>
             <div class="card-body">
                Your account has been successfully registered. Please check your email
                (<strong>{{ $email }}</strong>) for the next
                account verification
                process.
             </div>
             <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                <a class="btn btn-primary" href="{{ route('/') }}">Back home</a>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
