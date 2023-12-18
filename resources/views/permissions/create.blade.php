@extends('layouts.app')
@section('title','Create Permissions')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Permission</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('permissions.store') }}" method="POST">
                                @csrf
                                <p class="mt-3 fw-bold">Permission Name</p>
                                <div class="mb-3">
                                    <input type="text" name="name" id="" class="form-control input-rounded" placeholder="Permission Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
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
