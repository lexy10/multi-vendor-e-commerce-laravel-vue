@extends('admin.layout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}</style>
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                    <a href="{{route('admin.categories')}}"> < Back to List</a>
                    <br><br>
                      <h4 class="card-title">Edit Category</h4>
                      <br>
                      <form class="forms-sample" method="post"  id="cat_form" action="{{ route('admin.categories.update', ['id' => $category->id]) }}">
                      {{csrf_field()}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                          <input type="text" class="form-control" id="Name" name="name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Category Type</label>
                          <textarea type="textarea" class="form-control" id="Type" name="type" >{{$category->type}}</textarea>
                        </div>
                        <input  type="submit" name="updateButton"  class="btn btn-success mr-2" id="updateButton" value="UPDATE" />
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

@endsection
