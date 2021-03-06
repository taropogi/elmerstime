@extends('layouts.app')

@section('content')

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<style>
    .jumbotron {
        padding-top: 3rem;
        padding-bottom: 3rem;
        margin-bottom: 0;
        background-color: #fff;
    }

    @media (min-width: 768px) {
        .jumbotron {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }
    }

    .jumbotron p:last-child {
        margin-bottom: 0;
    }

    .jumbotron h1 {
        font-weight: 300;
    }

    .jumbotron .container {
        max-width: 40rem;
    }

    footer {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    footer p {
        margin-bottom: .25rem;
    }
</style>


<main role="main">

    <section class="jumbotron text-center pb-2 pt-2">
        <div class="container">
            <h1>{{ $user->first_name }}'s Gallery</h1>
            {{ $user->photos()->count() }} Photos
            <a href="{{ route('entrant.rewards',$user) }}">
                <span class="float-right">
                    <i class="fa fa-star" style="color:red;" aria-hidden="true"></i>
                    {{ $user->available_stars() }}
                </span>
            </a>
            <a class="btn btn-primary" href="{{ route('kids.photo.create',$user) }}" role="button">Upload Photo</a>
        </div>
    </section>

    <div class="album py-5 bg-light">


        <div class="row">
            @foreach($user->photos as $photo)
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" />
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        <image href="{{ asset('images/gallery/'.$photo->file_name) }}" height="225" width="100%" />
                    </svg>

                    <div class="card-body">
                        <p class="card-text">
                            {!! $photo->status_alert() !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">{{ $photo->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</main>
@endsection