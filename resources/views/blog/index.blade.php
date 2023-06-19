@extends('layouts.master')
@section('index')



<div class="container-fluid">
    <main class="tm-main">
        <!-- Search form -->
        <div class="row tm-row">
            <div class="col-12">
                <form method="GET"   class="form-inline tm-mb-80 tm-search-form" >
                    @csrf
                    <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                    <button class="tm-search-button" type="submit">
                        <i class="fas fa-search tm-search-icon" ></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row tm-row">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
               All Posts In Blog Are <strong>{{ $posts->total() }}</strong>
            @foreach ($posts as $post )


            <article class="col-12 col-md-6 tm-post">
                <hr class="tm-hr-primary">

                <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->title}}</h2>
                <div >
                    <img src="{{asset($post->image)}}" alt="Image"  class="img-fluid" alt="Responsive image" style="width:190px">
                    </div>
                <p class="tm-pt-30">
                    {{$post->subject}}

                </p>
                <div class="d-flex justify-content-between tm-pt-45">

                    <span class="tm-color-primary">{{$post->title}}</span>

                    <span class="tm-color-primary">posted by {{
                        $post->user->name ?? 'None'  }}
                           </span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    @foreach ($tags as $tag )




                    <span>{{$tag}} </span>
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    <span>36 comments</span>

                </div>
            </article>
            @endforeach
        </div>
        <div class="row tm-row tm-mt-100 tm-mb-75">
            {{ $posts->links() }}
           Page  {{ $posts->currentPage() }}
        </div>
        <footer class="row tm-row">
            <hr class="col-12">
            <div class="col-md-6 col-12 tm-color-gray">
                Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
            </div>
            <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                Copyright 2020 Xtra Blog Company Co. Ltd.
            </div>
        </footer>
    </main>
</div>

@endsection
