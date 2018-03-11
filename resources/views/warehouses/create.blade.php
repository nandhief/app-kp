@extends('layouts.app')

@section('content')
    <h3 class="page-title">Inventory</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['warehouses.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Create
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity', 'Stok Inventory', ['class' => 'control-label']) !!}
                    {!! Form::text('quantity', old('quantity'), ['class' => 'form-control', 'placeholder' => 'Jumlah Stok']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity'))
                        <p class="help-block">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('product', 'Product*', ['class' => 'control-label']) !!}
                    {!! Form::select('product', $products, old('product'), ['class' => 'form-control product']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('product'))
                        <p class="help-block">
                            {{ $errors->first('product') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('select2') }}/css/select2.min.css">
@endsection

@section('javascript')
    <script src="{{ asset('select2') }}/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.product').select2();
        });
    </script>
@endsection