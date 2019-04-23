@extends('master')

@section('container')
<div class='container'>
<div class='col-sm-4'></div>
<div class='col-sm-4'>
    <h3 class='text-center'>Log in!</h3>
    <form class='form-horizontal' action='/login' method='post'>
    @csrf
    <label class='control-label'>Username:</label> <input type='text' class='form-control' name='username' placeholder='Your Username...'><br>
    <label class='control-label'>Password:</label> <input type='password' class='form-control' name='password' placeholder='Your Password...'><br>
    <input type=submit class='btn btn-success' value='Log In!'>
</form>
</div>
<div class='col-sm-4'></div>
</div>
<div class='text-center'>
{!!$message!!}
</div>
@endsection
