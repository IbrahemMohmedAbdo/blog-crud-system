@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit post {{ $post->title }}</div>



                </div>



            <form method="POST" action={{route('post.update',[$post->id])}} enctype="multipart/form-data">

                @method('PUT')
                @csrf




          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value={{ $post->title }} required autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Write Your Post here') }}</label>

            <div class="col-md-6">

                <textarea class="form-control" id="exampleFormControlTextarea1"  name="subject" class="form-control @error('subject') is-invalid @enderror" >{{ $post->subject }}</textarea>
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    submit
                </button>
            </div>
        </div>


           </form>

        </div>
    </div>
</div>

    </div>
</div>
@endsection
