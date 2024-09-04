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
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-info"><i class="fas fa-angle-left"> </i>
                            Back</a>
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
                                <th scope="col">User</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created-at</th>
                                <th scope="col">Deleted-at</th>
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
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->category}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->deleted_at}}</td>
                                        <td>
                                            <a href="{{route('posts.restore',$post->id)}}" class="btn btn-success"><i class="fa-solid fa-arrow-rotate-right"></i></i></a>
                                            <a href="{{route('posts.forceDelete',$post->id)}}" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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
                  

                </div>
            </div>
        </div>
    </div>
</div>

@endsection