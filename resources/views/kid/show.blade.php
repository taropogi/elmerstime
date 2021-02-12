@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $kid->full_name() }} Gallery | {{ $kid->photos()->count() }} Photos
                    <span class="float-right">
                        <i class="fa fa-star" style="color:red;" aria-hidden="true"></i>
                        {{ $kid->approvedPhotos()->count() }}
                    </span>
                </div>

                <div class="card-body">
                    <form action="{{ route('kids.photo.store',$kid) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" required>
                            <label class="custom-file-label" for="photo">Choose file</label>

                        </div>

                        <div class="form-group">
                            <label for="description">Decription</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kid->photos as $photo)
                            <tr>
                                <td>
                                    <img style="max-width:130px;" src="{{ asset('images/gallery/'.$photo->file_name) }}" class="img-fluid" alt="...">
                                </td>
                                <td>
                                    {!! $photo->status_alert() !!}

                                </td>
                                <td>
                                    <a class="btn btn-danger" href="#" role="button">Delete</a>
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