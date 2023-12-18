@extends('layouts.app')
@section('title','Add New Role')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf
                                <p class="mt-3 fw-bold">Role Name</p>
                                <div class="mb-3">
                                    <input type="text" name="name" id="brand_name" class="form-control input-rounded" placeholder="Role Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <p class="mt-3 fw-bold">Select Permission</p>

                                {{-- <select class="multi-select select2-hidden-accessible" name="permissions[]" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true">                                   
                                    @foreach (Spatie\Permission\Models\Permission::all() as $permission)
                                        <option value="{{ $permission->id }}" data-select2-id="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select> --}}
                                <div class="button-container">
                                    <button type="button"  class="border-0 outline-none bg-transparent" onclick="selectAll()">Select All</button>
                                    <button type="button" class="border-0 text-warning ps-3 outline-none bg-transparent" onclick="deselectAll()">Deselect All</button>
                                </div>
                                <select class="select2-multiple  w-100 form-control" name="permissions[]" multiple="multiple"
                                    id="select2Multiple">
                                    @foreach (Spatie\Permission\Models\Permission::all() as $permission)
                                        <option value="{{ $permission->id }}" data-select2-id="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach             
                                </select>

                                <button class="btn btn-primary mt-3" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
