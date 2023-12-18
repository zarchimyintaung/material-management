@extends('layouts.app')
@section('title','Edit Role')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-primary alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                    
                @endif
            </div>
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('roles.update',['role' => $role]) }}" method="POST">
                                @csrf

                                <p class="mt-3 fw-bold">Role Name</p>

                                <div class="mb-3">
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control input-rounded" placeholder="Role Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <p class="mt-3 fw-bold">Select Permission</p>

                                <div class="button-container">
                                    <button type="button"  class="border-0 outline-none bg-transparent" onclick="selectAll()">Select All</button>
                                    <button type="button" class="border-0 text-warning ps-3 outline-none bg-transparent" onclick="deselectAll()">Deselect All</button>
                                </div>
                                @php
                                    $selected = $role->permissions->pluck('name')->toArray();
                                @endphp
                                <select class="select2-multiple  w-100 form-control" name="permissions[]" multiple="multiple" 
                                    id="select2Multiple">
                                    @foreach (Spatie\Permission\Models\Permission::all() as $permission)
                                        @if (in_array($permission->name,$selected))
                                            <option value="{{ $permission->id }}" data-select2-id="{{ $permission->id }}" selected>{{ $permission->name }}</option>
                                        @else
                                            <option value="{{ $permission->id }}" data-select2-id="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endif
                                    @endforeach             
                                </select>
                                
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
