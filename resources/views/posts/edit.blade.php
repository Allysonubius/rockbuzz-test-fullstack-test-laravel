@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts Edit</div>

                <div class="card-body">
                    <form action="{{ url('posts/update/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="totle" class="text-muted">Title</label>
                            <input id="title" type="text" value="{{ $post->title }}" name="title" class="form-control">
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="text-muted">Body</label>
                            <textarea id="body" name="body" rows="10" class="form-control">{{ $post->body }}</textarea>
                            @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="author" class="text-muted">Author</label>
                                <input type="text" name="author" value="{{ $post->author }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Change Image</label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{ $post->image }}">
                            </div>
                            <div class="form-group">
                            <label for="No published" class="">Change Status</label>
                                <p></p>
                                <input type="checkbox" name="published" value="0">
                                <label for="No published" class="text-muted">No published</label>
                                <input type="checkbox" name="published" value="1">
                                <label for="Published" class="text-muted">Published</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
