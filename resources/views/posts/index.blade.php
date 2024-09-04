@extends('layouts.app')

@section('content')
@php
    $i = 1;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-content-center">
                    <h2 class="text-bg-info">Posts</h2>
                    <div>
                    <a href="{{route('post.create')}}" class="btn btn-outline-primary"><i class="fas fa-plus"> </i> New
                        Post</a>
                    <a href="{{route('posts.trashed')}}" class="btn btn-btn-outline-success"><i class="fa-solid fa-trash-can-arrow-up"></i></a>
                        </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">User Id</th>
                                <!-- <th scope="col">User Name</th> -->
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created-at</th>
                                <th scope="col">Updated-at</th>
                                <th scope="">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts->count() > 0)
                                @foreach ($posts as $post)
                                    <tr>
                                        <th>{{$i++}}</th>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user_id}}</td>
                                        <!-- <td>{{$post->user->name}}</td> -->
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->category}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->updated_at}}</td>
                                        <td>
                                            <a href="{{route('post.show',$post->slug)}}" class="btn btn-primary"><i class="fa-solid fa-binoculars"></i></a>
                                            <a href="{{route('post.edit',$post->id)}}" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="{{route('posts.destoy',$post->id)}}" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                               
                            @else
                                <tr>
                                    <td colspan="8">No data yet!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-center align-content-lg-center">
                                    {{ $posts->links() }}
                                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection