@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vendors</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Store Name
                                    </th>
                                    <th>
                                        Number of Products
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendors as $vendor)
                                    <tr>
                                        <td class="font-weight-medium">
                                            {{$vendor->vendor_name}}
                                        </td>
                                        <td class="font-weight-medium">
                                            {{$vendor->store_name}}
                                        </td>
                                        <td class="font-weight-medium">
                                            {{count($vendor->products)}}
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
@endsection
