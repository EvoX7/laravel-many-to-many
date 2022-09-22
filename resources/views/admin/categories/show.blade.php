@extends('layouts.app')


@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card text-center w-100">
            <div class="card-header">
                <h3>Category color</h3>
                <h1 class="card-title font-weight-bold" style="background-color:{{ $category->color }}">
                    {{ $category->name }}</h1>
            </div>
            <div class="card">
                @forelse ($category->posts as $post)
                    <a href="{{ route('admin.posts.show', $post->id) }}">
                        {{ $post->title }}</a>
                @empty
                    <p>No category available</p>
                @endforelse

            </div>
        </div>

    </div>
@endsection

