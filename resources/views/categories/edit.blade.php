@extends('layouts.app')
@section('title','Edit Category')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $category->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('categories.update',['category' => $category]) }}" method="POST">
                                @csrf
                                <p class="mt-3 fw-bold">Category Name</p>

                                <div class="mb-3">
                                    <input type="text" name="name" id="cat_name_edit" value="{{ $category->name }}" class="form-control input-rounded" placeholder="Category Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <p class="mt-3 fw-bold">Category Name</p> --}}

                                <div class="mb-3">
                                    <input type="hidden" id="cat_slug_edit" value="{{ $category->slug }}" class="form-control input-rounded" placeholder="Slug Name" disabled>
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>

        document.querySelector("#cat_name_edit").addEventListener('keyup',() => {
            let slug = document.querySelector("#cat_name_edit").value.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
            document.querySelector("#cat_slug_edit").value = slug
        })
    </script>
@endsection