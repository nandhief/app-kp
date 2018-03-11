@extends('layouts.app')

@section('content')
    <h3 class="page-title">Inventories</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Stok Inventory</th>
                    <td>{{ $warehouse->quantity }}</td></tr>
                        <tr><th>Produk</th>
                    <td>{{ $warehouse->product->name }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('warehouses.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop