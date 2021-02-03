@extends('layouts.app')


@section('content')

<a class="btn btn-primary" href="{{ route('login') }}" role="button">
    Already registered? Click here to sign in
</a>
<br><br>
<a class="btn btn-danger" href="{{ route('register') }}" role="button">
    First time to register? Register here
</a>


@endsection