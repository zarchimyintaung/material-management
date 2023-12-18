@extends('layouts.app')
@section('title','Items')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $item->code }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('items.update',['item' => $item]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-3 fw-bold">Code</p>
                                        <div class="mb-3">
                                            <input type="text" name="code" id="" value="{{ $item->code }}" class="form-control input-rounded" placeholder="Code">
                                            @error('code')
                                                <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                            @enderror
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <p class="mt-3 fw-bold">Select Category</p>
                                            <select class="default-select mb-3 form-control wide" value="{{ $item->category_id }}" id="category_id" name="category_id">
                                                <option value="">Select Category</option>
                                                @foreach (App\Models\Category::all() as $category)
                                                    @if ($category->id == $item->category_id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>                                                        
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <p class="mt-3 fw-bold">Select Type</p>
                                            <select class="default-select mb-3 form-control wide" value="{{ $item->brand_id }}" name="brand_id">
                                                <option value="">Select Type</option>
                                                @foreach (App\Models\Brand::all() as $brand)
                                                    @if ($brand->id == $item->brand_id)
                                                        <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                                    @else
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <p class="mt-3 fw-bold">Select Department</p>
                                            <select class="default-select mb-3 form-control wide" value="{{ $item->department_id }}" name="department_id">
                                                <option value="">Select Department</option>
                                                @foreach (App\Models\Department::all() as $department)
                                                    @if ($department->id == $item->department_id)
                                                        <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                                                    @else
                                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check custom-checkbox mb-3">
                                            <input type="checkbox" class="form-check-input" name="is_repair" id="is_repair" value="1" {{ $item->is_repair || old('is_repair',0) === 1 ? 'checked' : '' }}>
                                            <label class="form-check-label mt-2" for="is_repair">Repair</label>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check custom-checkbox mb-3">
                                            <input type="checkbox" class="form-check-input" name="is_store" id="is_store" value="1" {{ $item->is_store || old('is_store',0) === 1 ? 'checked' : '' }}>
                                            <label class="form-check-label mt-2" for="is_store">Store Keeping</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" value="<?= $item->computer !== null ? '1' : '0' ?>" name="is_computer" class="is_computer" hidden>
                                <div class="form-check form-switch my-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="computer-btn">
                                    <label class="form-check-label mt-2" for="computer-btn">Computer Details</label>
                                </div>
                                <div class="computer-details d-none">
                                    @if ($item->computer == null)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">Primary Memory (RAM)</p>
                                                <div class="mb-3">
                                                    <input type="text" name="primary_memory" id="primary_memory" class="form-control input-rounded" placeholder="Primary Memory">
                                                    @error('primary_memory')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">Secondary Memory (HDD or SSD)</p>
                                                <div class="mb-3">
                                                    <input type="text" name="secondary_memory" id="secondary_memory" class="form-control input-rounded" placeholder="Secondary Memory">
                                                    @error('secondary_memory')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">Generation</p>
                                                <div class="mb-3">
                                                    <input type="text" name="generation" id="generation" class="form-control input-rounded" placeholder="Generation">
                                                    @error('generation')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">System Model</p>
                                                <div class="mb-3">
                                                    <input type="text" name="system_model" id="system_model" class="form-control input-rounded" placeholder="System Model">
                                                    @error('system_model')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">CPU</p>
                                                <div class="mb-3">
                                                    <input type="text" name="cpu" id="cpu" class="form-control input-rounded" placeholder="CPU">
                                                    @error('cpu')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">USB</p>
                                                <div class="mb-3">
                                                    <input type="text" name="usb" id="usb" class="form-control input-rounded" placeholder="USB">
                                                    @error('usb')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" name="is_dvd" id="is_dvd" >
                                                    <label class="form-check-label mt-2" for="is_dvd">Dvd Drive</label>
                                                </div>
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" id="is_network" name="is_network">
                                                    <label class="form-check-label mt-2" for="is_network">Network Exist</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" id="is_hdmi" name="is_hdmi" >
                                                    <label class="form-check-label mt-2" for="is_hdmi">HDMI</label>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">Primary Memory (RAM)</p>
                                                <div class="mb-3">
                                                    <input type="text" name="primary_memory" id="primary_memory" value="{{ $item->computer->primary_memory }}" class="form-control input-rounded" placeholder="Primary Memory">
                                                    @error('primary_memory')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">Secondary Memory (HDD or SSD)</p>
                                                <div class="mb-3">
                                                    <input type="text" name="secondary_memory" id="secondary_memory" value="{{ $item->computer->secondary_memory }}" class="form-control input-rounded" placeholder="Secondary Memory">
                                                    @error('secondary_memory')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">Generation</p>
                                                <div class="mb-3">
                                                    <input type="text" name="generation" id="generation" value="{{ $item->computer->generation }}" class="form-control input-rounded" placeholder="Generation">
                                                    @error('generation')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">System Model</p>
                                                <div class="mb-3">
                                                    <input type="text" name="system_model" id="system_model" value="{{ $item->computer->system_model }}" class="form-control input-rounded" placeholder="System Model">
                                                    @error('system_model')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">CPU</p>
                                                <div class="mb-3">
                                                    <input type="text" name="cpu" id="cpu" class="form-control input-rounded" value="{{ $item->computer->cpu }}" placeholder="CPU">
                                                    @error('cpu')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mt-3 fw-bold">USB</p>
                                                <div class="mb-3">
                                                    <input type="text" name="usb" id="usb" class="form-control input-rounded" value="{{ $item->computer->usb }}" placeholder="USB">
                                                    @error('usb')
                                                        <p class="text-danger mt-2 ml-2">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" name="is_dvd" id="is_dvd" value="1" {{ $item->computer->is_dvd || old('is_dvd',0) === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label mt-2" for="is_dvd">Dvd Drive</label>
                                                </div>
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" id="is_network" name="is_network" value="1" {{ $item->computer->is_network || old('is_network',0) === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label mt-2" for="is_network">Network Exist</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" id="is_hdmi" name="is_hdmi" value="1" {{ $item->computer->is_hdmi || old('is_hdmi',0) === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label mt-2" for="is_hdmi">HDMI</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
