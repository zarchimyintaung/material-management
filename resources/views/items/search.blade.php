<form action="{{ route('items.index') }}" id="item-search" class="d-block">
    <div class="row my-3">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" name="code" id="code_search" class="form-control input-rounded" placeholder="Search by code">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <select class="default-select mb-3 form-control wide" id="department_name_search" name="department_name">
                <option value="">Search Department</option>
                @foreach (App\Models\Department::all() as $department)
                    <option value="{{ $department->name }}">{{ $department->name }}</option>
                @endforeach
            </select>                            
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <select class="default-select mb-3 form-control wide" id="brand_name_search" name="brand_name">
                <option value="">Search by Type</option>
                @foreach (App\Models\Brand::all() as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <select class="default-select mb-3 form-control wide" id="category_name_search" name="category_name">
                <option value="">Select Category</option>
                @foreach (App\Models\Category::all() as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>