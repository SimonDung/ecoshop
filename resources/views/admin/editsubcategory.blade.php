@extends('admin.layouts.template')
@section('pagetitle')
Edit Sub Category
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Edit Sub Category</h4>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('admin.updatesubcategory') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $subcategory_info->id }}" name="subcategory_id">
                    <div class="form-group">
                      <label for="subcategory_name">Enter Sub Category Name</label>
                      <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" 
                      value="{{ $subcategory_info->subcategory_name }}">
                    </div>
                    @php
                      $categories = App\Models\Category::where('status','active')->get();
                    @endphp

                    <div class="form-group">
                        <label for="category_name">Select Category</label>
                        <select name="category_id" class="form-control">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($subcategory_info->category_id == $category->id)
                              Selected
                            @endif>{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                      </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">Update Sub Category</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection