@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">

                <h1 class="mt-3 mb-5 text-center">List category</h1>

                @if (session('delete'))
                    <div class="alert alert-danger">
                        "{{ session('delete') }}" - has been removed successfully.
                    </div>
                @elseif (session('created'))
                    <div class="alert alert-success">
                        "{{ session('created') }}" - has been created successfully.
                    </div>
                @endif

                <a class="navbar-brand btn btn-success float-right mb-2" href="{{ route('admin.categories.create') }}">
                    New category</a>
                <table class="table table-info table-striped">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Color</th>



                    </thead>
                    <tbody>

                        @forelse ($categories as $category)
                            <tr>
                                <td class="fw-bold">{{ $category->id }}</td>
                                <td class="font-weight-bold">{{ $category->name }}</td>
                                <td class="fw-bold"><a class="font-weight-bold"
                                        href="{{ route('admin.categories.show', $category->id) }}">{{ $category->slug }}</a>
                                </td>
                                <td> <span class="badge badge-pill text-light w-75"
                                        style="background-color: {{ $category->color }} ">
                                        {{ $category->name }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-info font-weight-bold"
                                        href="{{ route('admin.categories.show', $category->id) }}">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary font-weight-bold"
                                        href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form class="text-white" action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="category">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h3 class="fs-1 mt-5">No categories available</h3>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
