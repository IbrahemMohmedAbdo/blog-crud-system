@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                <div class="card-header">  Welcome To Your profile <strong>{{ $user->name ?? '' }}</strong></div>

                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Create New POst</a>
                        <br>
                      All Posts To Yours Here
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      @if(isset($user))


                      @foreach ($user->posts as $post )
                      <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->title}}</h2>
                      <div >
                        <img src="{{asset($post->image)}}" alt="Image"  class="img-fluid" alt="Responsive image" style="width:190px">
                        </div>
                      <p class="card-text">{{ $post->subject }}</p>

                      <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-primary">Edit Post</a>
                    </div>
                    @endforeach


                    @endif

                    <div class="card-footer text-muted">
                      2 days ago
                    </div>
                  </div>

                </div>









    </div>
</div>
@endsection
