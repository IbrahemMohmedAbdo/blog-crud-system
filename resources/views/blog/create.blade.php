@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Post') }}</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif


                </div>




            <form method="POST" action={{route('post.store')}} enctype="multipart/form-data">


                @csrf
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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

                <textarea class="form-control" id="exampleFormControlTextarea1"  name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('title') }}"></textarea>
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="tags"  class="col-md-4 col-form-label text-md-end">Tags</label>
            <div class="col-md-6">
            <select class="form-control" name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
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
@endsection

