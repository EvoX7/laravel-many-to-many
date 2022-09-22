@extends('layouts.app')


@section('content')
    <div class="container mb-4 mt-2">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="mt-3 mb-3 text-center">Edit</h1>
                <form class="font-weight-bold" action="{{ route('admin.categories.update', $category->name) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.categories.includes.form')
                    <a class="btn btn-primary font-weight-bold"
                    href="{{ route('admin.categories.show', $category->id) }}">Modify</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection
