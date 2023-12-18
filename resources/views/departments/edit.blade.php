@extends('layouts.app')
@section('title','Edit Department')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $department->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('departments.update',['department' => $department]) }}" method="POST">
                                @csrf
                                <p class="mt-3 fw-bold">Department Name</p>

                                <div class="mb-3">
                                    <input type="text" name="name" id="department_name_edit" value="{{ $department->name }}" class="form-control input-rounded" placeholder="Department Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <p class="mt-3 fw-bold">Slug Name</p> --}}

                                <div class="mb-3">
                                    <input type="hidden" id="department_slug_edit" value="{{ $department->slug }}" class="form-control input-rounded" placeholder="Slug Name" disabled>
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

        document.querySelector("#department_name_edit").addEventListener('keyup',() => {
            let slug = document.querySelector("#department_name_edit").value.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
            document.querySelector("#department_slug_edit").value = slug
        })
    </script>
@endsection