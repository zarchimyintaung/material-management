@extends('layouts.app')
@section('title','Users')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('users.update',['user' => $user]) }}" method="POST">
                                @csrf

                                <p class="mt-3 fw-bold">Your Name</p>
                                <div class="mb-3">
                                    <input type="text" name="name" id="user_name" value="{{ $user->name }}" class="form-control input-rounded" placeholder="User Name">
                                    @error('name')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- <p class="mt-3 fw-bold">Slug Name</p> --}}

                                <div class="mb-3">
                                    <input type="hidden" id="user_slug" value="{{ $user->slug }}" class="form-control input-rounded" placeholder="Slug Name" disabled>
                                </div>

                                <p class="mt-3 fw-bold">Your Email</p>
                                <div class="mb-3">
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control input-rounded" placeholder="Email">
                                    @error('email')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <p class="mt-3 fw-bold">Select Role</p>
                                <div class="mb-3">
                                    <select class="default-select mb-3 form-control wide" name="role_id" required>
                                        <option disabled>Select Role</option>
                                        @foreach (Spatie\Permission\Models\Role::all() as $role)
                                           @if (count($user->roles) > 0)
                                                @if ($user->roles[0]->name == $role->name)
                                                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>                                                
                                                @else
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>                                                
                                                @endif
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>                                                
                                           @endif
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                    @enderror
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

@push('scripts')
    <script>
        document.querySelector("#user_name").addEventListener('keyup',() => {
            let slug = document.querySelector("#user_name").value.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
            document.querySelector("#user_slug").value = slug
        })
    </script>
@endpush