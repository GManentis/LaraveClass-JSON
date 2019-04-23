@extends('master')

@section('container')
<div class='container'>
<div class='col-sm-4'></div>
<div class='col-sm-4'>
    <h3 class='text-center'>Sign up today!</h3>
    <form class='form-horizontal' action='/signup' method='post'>
    @csrf
    <label class='control-label'>Username:</label> <input type='text' class='form-control' name='username' placeholder='Your Username...'><br>
    <label class='control-label'>Password:</label> <input type='password' class='form-control' name='password' placeholder='Your Password...'><br>
    <label class='control-label'>Repeat Password:</label> <input type='password' class='form-control' name='password2' placeholder='Repeat Password...'><br>
    <label class='control-label'>Email:</label> <input type='email' class='form-control' name='mail' placeholder='Your Email...'><br>
    <input type=submit class='btn btn-success' value='Sign Up!'>
</form>
</div>
<div class='col-sm-4'></div>
</div>
<div class='text-center'>
{!!$message!!}
</div>
@endsection
