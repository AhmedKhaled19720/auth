@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-content-center">
                    <h2 class="text-bg-info">New Post</h2>
                    <a href="{{route("posts.index")}}" class="btn btn-outline-info"><i class="fas fa-angle-left"> </i>
                        Back</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('post.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="TitleHelp"
                                required>
                            <small id="TitleHelp" class="form-text text-muted">Title Should be aprif and Max 50
                                Charactar.</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>

                        </div>
                        <!-- <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div> -->

                        <div class="form-group">

                            <label for="category">Category</label>

                            <select name="category" id="category" class="form-control" >

                                <option value=""></option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                                <option value="Action">Action</option>
                            </select>
                        </div>




                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection