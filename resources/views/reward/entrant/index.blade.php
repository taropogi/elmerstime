@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    {{ $kid->available_stars() }}
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Stars Required</th>
                                <th scope="col">Claim</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rewards as $reward)
                            <tr>
                                <td>{{ $reward->title }}</td>
                                <td>{{ $reward->description }}</td>
                                <td>{{ $reward->stars_required }}</td>
                                <td>
                                    <form action="{{ route('entrant.rewards.claim',[$kid,$reward]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Claim</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection