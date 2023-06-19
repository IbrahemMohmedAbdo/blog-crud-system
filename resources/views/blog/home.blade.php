@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Blog') }}</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('post.create')}}">
                      <button type="button" class="btn btn-info btn-bordred waves-effect w-md waves-light m-b-5">Create New Post</button>
                  </a>

                  <a href="{{ route('users.show',Auth::user()->id) }}">
                      <button type="button" class="btn btn-info btn-bordred waves-effect w-md waves-light m-b-5">Profile</button>

                  </a>


                </div>


                <div class=" col-md-6">


                </div>




    </div>
</div>
@endsection
