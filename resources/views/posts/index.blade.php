@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-success" href="{{ url('posts/create') }}">create</a>
<br></br>
<div class="justify-content-center">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header">Posts Published</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postsOn as $post)

                            <tr>
                                <td> <img src="{{ url("imagesPosts/{$post->image}") }}" class="card-img-top" alt="Image" style="max-width:100px" /></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('posts/edit/' . $post->id) }}">Edit</a>

                                    <a class="btn btn-danger" href="{{ url('posts/destroy/' . $post->id) }}">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br></br>
    <div class="justify-content-center">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header">Posts No Published</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postsOff as $post)

                            <tr>
                                <td> <img src="{{ url("imagesPosts/{$post->image}") }}" class="card-img-top" alt="Image" style="max-width:100px" /></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('posts/edit/' . $post->id) }}">Edit</a>

                                    <a class="btn btn-danger" href="{{ url('posts/destroy/' . $post->id) }}">Delete</a>

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
