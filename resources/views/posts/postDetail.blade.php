@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Posts Edit</div> -->

                <div class="card-body">
                    <form action="{{ url('posts/update/' . $post->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div>
                            <label for="totle" class="text-muted">Created at: {{ $post->created_at }}</label>
                            <p><label for="totle" class="text-muted">Author: {{ $post->author }}</label></p>
                            <h1 class="title-detail">{{ $post->title}}</h1>
                        </div>
                        <div class="col">

                    <div class="card" id="card" style="width: 40rem;">
                            <img src="{{ url("imagesPosts/{$post->image}") }}" class="card-img-detail" alt="Image" />
                        <p></p>
                    </div>
                </div>
                        <div class="form-group">
                            <label for="body" class="text-muted">Description</label>
                            <p class="text-sm-left" id="body" name="body" rows="10" class="form-control">{{ $post->body }}</p>
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
