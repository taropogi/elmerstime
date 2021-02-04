@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registered Entrants</div>

                <div class="card-body">
                    <div>
                        Kids : {{ $kids->count() }}
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('kids.register') }}" role="button">Register Kid</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Realationship</th>
                                    <th scope="col">Gallery Photos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kids as $kid)
                                <tr>
                                    <td>
                                        <a href="{{ route('kids.gallery',$kid) }}">
                                            {{ $kid->full_name() }}
                                        </a>
                                    </td>
                                    <td>{{ $kid->kid_relationship }}</td>
                                    <td>{{ $kid->photos()->count() }}</td>
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