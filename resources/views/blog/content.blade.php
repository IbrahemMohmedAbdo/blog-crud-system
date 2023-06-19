@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <main class="tm-main">
        @foreach ($tags as $tag )


        <span class="position-absolute tm-new-badge">{{$tag }}</span>
        @endforeach
    </a>

        <!-- Search form -->

        <div class="row tm-row">
            <article class="col-12 col-md-6 tm-post">
                <hr class="tm-hr-primary">
                <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <img src="{{asset($post->image)}}"  alt="Image" class="img-fluid">
                    </div>
                    <span class="position-absolute tm-new-badge">{{ $post->title }}</span>
                    <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{ $post->subject }} </h2>
                    @foreach ($tags as $tag )


                    <span class="position-absolute tm-new-badge">{{$tag }}</span>
                    @endforeach
                </a>

            </article>

        </div>
        <div class="row tm-row tm-mt-100 tm-mb-75">

        </div>

    </main>

</div>
@endsection
