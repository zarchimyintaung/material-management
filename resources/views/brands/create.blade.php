@extends('layouts.app')
@section('title','Add New Type')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('types.store') }}" method="POST">
                                @csrf
                                <p class="mt-3 fw-bold">Type Name</p>

                                <div class="mb-3">
                                    <input type="text" name="name" id="brand_name" class="form-control input-rounded" placeholder="Type Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <p class="mt-3 fw-bold">Slug Name</p> --}}
                                <div class="mb-3">
                                    <input type="hidden" id="brand_slug" class="form-control input-rounded" placeholder="Slug Name" disabled>
                                </div>

                                <button class="btn btn-primary" type="submit">Save</button>
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
        document.querySelector("#brand_name").addEventListener('keyup',() => {
            let slug = document.querySelector("#brand_name").value.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
            document.querySelector("#brand_slug").value = slug
        })
        
    </script>
@endsection