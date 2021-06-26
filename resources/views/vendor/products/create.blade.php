@extends('vendor.layout')
@section('content')
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/dist/additional-methods.js')}}"></script>

    <style>label.error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 1px 20px 1px 20px;
        }</style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a style="color:green;" href="{{route('admin.products')}}">
                                    < Back to List</a>
                                <br>
                                <br>
                                <h4>Create product</h4>
                                <br>
                                <br>
                                <br>
                                <form class="forms-sample" method="post" action="{{ route('vendor.product.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Product Image*</label>
                                        <input name="img" required type="file" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name*</label>
                                        <input type="text" required class="form-control" id="Name" name="name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Product Description*</label>
                                        <textarea type="textarea" required class="form-control" id="Description"
                                                  name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Category">Category*</label>
                                        <select class="form-control form-control-md" id="Category" name="category">
                                            @foreach($categories as $category) {
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price*</label>
                                        <input type="text" required class="form-control" name="price" id="Price" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Discounted Price*</label>
                                        <input type="text" required class="form-control" id="Discounted_Price"
                                               name="discounted_price" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Product Tags*</label>
                                        <input type="text" required class="form-control" id="Tags" name="tags" value="">
                                    </div>
                                    <input type="submit" name="saveButton" class="btn btn-success mr-2" id="saveButton"
                                           value="Create"/>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
