@extends('admin.layouts.template')
@section('pagetitle')
All Category
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>All Category</h4>
            </div>
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Sub Category Count</th>
                    <th>Product Count</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach ( $categories as $category )
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->sub_category_count }}</td>
                    <td>{{ $category->product_count }}</td>
                    <td>
                      @if($category->status =='active')
                          <div class="badge badge-success">Active</div>
                        
                      @else 
                        <div class="badge badge-danger">Not Active</div>
                      
                      @endif
                    </td>
                    <td><a href="{{ route('admin.editcategory',$category->id)  }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.deletecategory',$category->id) }}" class="btn btn-danger">Delete</a>
                    @if($category->status =='active')
                      <Form action="{{ route('admin.deactivatecategory') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $category->id }}" name="category_id">
                        <input type="submit" value="Deactivate" class="btn btn-danger">
                      </Form>
                    @else 
                      <form action="{{ route('admin.activatecategory') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $category->id }}" name="category_id">
                        <input type="submit" value="Activate" class="btn btn-primary">
                      </form>
                    @endif
                  </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span
                        class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
    </div>
</div>
@endsection