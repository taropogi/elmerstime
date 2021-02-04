@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        Kids : {{ auth()->user()->kids()->count() }}
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('kids.register') }}" role="button">Register Kid</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Realationship</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->kids as $kid)
                                <tr>
                                    <td>{{ $kid->full_name() }}</td>
                                    <td>{{ $kid->kid_relationship }}</td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection