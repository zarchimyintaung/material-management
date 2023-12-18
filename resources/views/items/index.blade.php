

@extends('layouts.app')
@section('title','Items')

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
                        <h4 class="card-title">Items List</h4>
                        @can('items')
                            <a href="{{ route('items.create') }}" class="btn btn-primary">Add New</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <a href="{{ route('items.index') }}" class="btn btn-primary">Get All</a>
                        @include('items.search')

                        <div class="my-3">
                            {{ $items->appends(request()->query())->links() }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>NO.</strong></th>
                                        <th><strong>Code</strong></th>
                                        <th><strong>Category</strong></th>
                                        <th><strong>Department</strong></th>
                                        <th><strong>Type</strong></th>
                                        <th><strong>Details</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong></strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @if (count($items) > 0)
                                        @foreach ($items as $key => $item)
                                            <tr>
                                                <td><strong>{{ ++$key }}</strong></td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->department->name }}</td>
                                                <td>{{ $item->brand->name }}</td>
                                                <td>
                                                    @if ($item->computer !== null)
                                                        <button type="button" class="bg-white border-0 fs-3" onclick="openItemDetailsModal({{ $item->id }})"><i class="fas fa-eye"></i></button>                                                 
                                                    @else
                                                        <button type="button" class="bg-white border-0 fs-3 disabled"><i class="fas fa-eye text-light"></i></button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->is_repair != NULL)
                                                        <div class="badge badge-danger">Repair</div>                                                                                                     
                                                    @else
                                                        @if ($item->is_store)
                                                            <div class="badge badge-warning">Store</div>                                                                                                            
                                                        @else
                                                            <div class="badge badge-success">Using</div>                                                                                                            
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-4">
                                                        @can('items')
                                                            <a href="{{ route('items.edit',['id' => $item->id]) }}" class="fw-bold fs-4 me-1"><i class="fas fa-pencil-alt"></i></a>                                                    
                                                        @endcan
                                                        @can('items')
                                                            <button type="button" class="fw-bold fs-4 bg-transparent text-danger border-0 outline-0" onclick="handleToggleDeleteConfirm('{{ route('items.delete',['id' => $item->id]) }}')"><i class="fa fa-trash-alt"></i></button>                                                        
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">
                                                <h5>There is no data</h5>
                                            </td>
                                        </tr>
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  modal detail --}}
        <div class="modal fade" id="itemDetailsModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-3 fw-bold">Computer Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="itemDetails"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
