@extends('layouts.app')
@section('title','Roles')

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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Roles</h4>
                        @can('roles')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New</a>                            
                        @endcan
                    </div>
                    <div class="card-body">
                        {{ $roles->links() }}
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                       
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <th>{{ ++$key }}</th>
                                            <td>{{ $role->name }}</td>
                            
                                            <td>
                                                @if (count($role->permissions) == 0)
                                                    <button class="bg-transparent border-0 text-muted fs-4"><i class="fas fa-eye"></i></button>                                              
                                                @else
                                                    <button class="bg-transparent border-0 fs-4" onclick="togglePermissionModal({{ $role->id }})"><i class="fas fa-eye"></i></button>                                              
                                                @endif
                                            </td>
                                            
                                            <td>
                                                
                                                @if ($role->name == 'Admin' || $role->name == 'User')
                                                    
                                                @else
                                                    @can('roles')
                                                        <a href="{{ route('roles.edit',['id' => $role->id]) }}">
                                                            <i class="fas fa-edit fs-4 fw-bold me-5"></i>                                                
                                                        </a>
                                                    @endcan
                                                    @can('roles')
                                                        <button type="button" class="fw-bold fs-4 bg-transparent text-danger border-0 outline-0" onclick="handleToggleDeleteConfirm('{{ route('roles.delete',['id' => $role->id]) }}')"><i class="fa fa-trash-alt"></i></button>                                                    
                                                    @endcan
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--  modal --}}
        <div class="modal fade" id="permissionModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-3 fw-bold">Permissions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card shadow-none">
                                    
                                    <div class="card-body">
                                        <div class="basic-list-group">
                                            <ul class="list-group" >
                                                <div class="row" id="permission-list">

                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
