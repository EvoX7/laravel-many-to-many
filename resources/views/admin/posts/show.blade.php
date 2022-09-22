@extends('layouts.app')


@section('content')

    <div class="container d-flex justify-content-center mt-5">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">{{ $post->title }}</h3>
                <img class="w-50 rounded-4 p-2" src="{{ $post->post_img }}" alt="Image_url">
                <p>Category: <span class="badge badge-pill text-light"
                        @if (isset($post->category)) style="background-color: {{ $post->category->color }} "> {{ $post->category->name }} 
                    @else 
                    style="background-color: grey"
                    Unlisted 
                    @endif
                        </span></p>
            </div>
            <div class="card-body">
                <p class="card-text fst-italic">{{ $post->post_content }}</p>
                <p class="card-text font-weight-bold">Author: {{ $post->user->name }}</p>
                <p class="card-text fst-italic">Posted: {{ $post->post_date }}</p>
            </div>
        </div>
    </div>
@endsection
