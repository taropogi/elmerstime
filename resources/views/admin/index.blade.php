@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $photos->count() }} Photos</div>

                <div class="card-body">







                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Approve</th>
                                <th scope="col">Deny</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($photos as $photo)
                            <tr>
                                <td>
                                    <img style="max-width:130px;" src="{{ asset('images/gallery/'.$photo->file_name) }}" class="img-fluid" alt="...">
                                </td>
                                <td>
                                    {!! $photo->status_alert() !!}
                                </td>
                                <td>
                                    <form class="form-inline pull-left" action="{{ route('admin.photos.approve',$photo) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form class="form-inline pull-left" action="{{ route('admin.photos.deny',$photo) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Deny</button>
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