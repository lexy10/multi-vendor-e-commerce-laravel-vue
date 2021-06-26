@extends('vendor.layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products Table <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('vendor.products.create')}}">+ Add Product</a></h4>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Images
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Delete
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/product_images/'.$product->image_name) }}" style="width:100px;height:100px;border-radius:10%;" alt="">
                                    </td>
                                    <td>
                                       <a href="{{route('vendor.products.edit', ['id' => $product->id])}}" class="btn btn-warning">{{$product->name}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('vendor.products.edit', ['id' => $product->id])}}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                    <td>
                                        {!! $product->description !!}
                                    </td>
                                    <td>
                                        {{$product->category->name}}
                                    </td>

                                    <td>
                                        <a href="{{route('vendor.products.delete', ['id' => $product->id])}}"class="btn btn-danger">Delete</a>
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

