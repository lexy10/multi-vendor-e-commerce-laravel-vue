@extends('vendor.layout')
@section('content')
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
                            <a href="{{route('admin.products')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 class="card-title">Edit product</h4>
                                    <br>
                            <form class="forms-sample" method="post" action="{{ route('vendor.product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="img-responsive">
                                        <img class="img-thumbnail img-responsive img-rounded" width="200" src="{{ asset('storage/product_images/'.$product->image_name) }}"/>
                                    </div>
                                    <label>Product Image*</label>
                                    <input name="img" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Product Name*</label>
                                    <input type="text" required class="form-control" id="Name" name="name" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Product Description*</label>
                                    <textarea type="textarea" required class="form-control" id="Description"
                                              name="description">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Category">Category*</label>
                                    <select class="form-control form-control-md" id="Category" name="category">
                                        @foreach($categories as $category) {
                                        <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Price*</label>
                                    <input type="text" required class="form-control" name="price" id="Price" value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label>Product Discounted Price*</label>
                                    <input type="text" required class="form-control" id="Discounted_Price"
                                           name="discounted_price" value="{{ $product->discount }}">
                                </div>

                                <div class="form-group">
                                    <label>Product Tags*</label>
                                    <input type="text" required class="form-control" id="Tags" name="tags" value="{{ $product->tag }}">
                                </div>
                                <input type="submit" name="saveButton" class="btn btn-success mr-2" id="saveButton"
                                       value="Update"/>
                            </form>
                            @if($errors)
                                <ul>
                                    @foreach($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
