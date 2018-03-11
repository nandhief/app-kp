@extends('layouts.app')

@section('content')
    <h3 class="page-title">Products</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Kode</th>
                            <td>{{ $product->category->kode . '-' . $product->kode }}</td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th>Kategory</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('products.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop