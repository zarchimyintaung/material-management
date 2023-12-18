@extends('layouts.app')
@section('title','Departments')

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
                        <h4 class="card-title">Departments</h4>
                        @can('departments')
                            <a href="{{ route('departments.create') }}" class="btn btn-primary">Add New</a>                            
                        @endcan
                    </div>
                    <div class="card-body">
                        {{ $departments->links() }}
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                       
                                    @foreach ($departments as $key => $department)
                                        <tr>
                                            <th>{{ ++$key }}</th>
                                            <td>{{ $department->name }}</td>
                                            
                                            <td>
                                                @can('departments')
                                                    <a href="{{ route('departments.edit',['slug' => $department->slug]) }}">
                                                        <i class="fas fa-edit fs-4 fw-bold me-5"></i>                                                
                                                    </a>
                                                @endcan
                                                @can('departments')
                                                    <button type="button" class="fw-bold fs-4 bg-transparent text-danger border-0 outline-0" onclick="handleToggleDeleteConfirm('{{ route('departments.delete',['slug' => $department->slug]) }}')"><i class="fa fa-trash-alt"></i></button>                                                                                            
                                                @endcan
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
    </div>
@endsection
