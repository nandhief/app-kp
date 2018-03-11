@extends('layouts.app')

@section('content')
    <h3 class="page-title">Warehouses</h3>

    {{-- <p>
        <a href="{{ route('warehouses.create') }}" class="btn btn-success">Add new</a>
    </p> --}}

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($warehouses) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($warehouses) > 0)
                        @foreach ($warehouses as $warehouse)
                            <tr data-entry-id="{{ $warehouse->id }}">
                                <td></td>
                                <td>{{ $warehouse->product->category->kode . '-' . $warehouse->product->kode . ' : ' . ucwords($warehouse->product->name) }}</td>
                                <td>{{ $warehouse->quantity }}</td>
                                <td>{{-- <a href="{{ route('warehouses.show',[$warehouse->id]) }}" class="btn btn-xs btn-primary">View</a> --}}<a href="{{ route('warehouses.edit',[$warehouse->id]) }}" class="btn btn-xs btn-info">Edit</a>{{-- {!! Form::open(array( 'style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("Are you sure?")."');", 'route' => ['warehouses.destroy', $warehouse->id])) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!} --}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    {{-- <script>
        window.route_mass_crud_entries_destroy = '{{ route('warehouses.mass_destroy') }}';
    </script> --}}
@endsection