@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-content-center">
                        <h2 class="text-bg-info">Post "{{ $post->title }}"</h2>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-info"><i class="fas fa-angle-left"> </i>
                            Back</a>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form  method="post" action="{{ route('post.update', $post->id) }}">

                            @csrf
                            @method('PUT')
                            <div class="row ">
                                <div class="container d-flex">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ old('title',$post->title)}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">User</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id"
                                                value="{{ $post->user_id }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea type="text" class="form-control" id="description" name="description">{{ $post->description }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" id="category" name="category"
                                                value="{{ $post->category }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 flex-column justify-content-center align-content-center">
                                        <div class="form-group">
                                            <label for="created_at">Created_at</label>
                                            <input type="text" class="form-control" id="created_at" name="created_at"
                                                value="{{ $post->created_at }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="updated_at">Updated_at</label>
                                            <input type="text" class="form-control" id="updated_at" name="updated_at"
                                                value="{{ $post->updated_at }}" readonly>
                                        </div>

                                    </div>


                                </div>
                            </div>
                             <button type="submit"
                                    class="btn btn-primary btn-block">Update</button>
                     

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
