@extends('layouts.app')

@section('content')
    <h3 class="page-title">Inventories</h3>
    
    {!! Form::model($warehouse, ['method' => 'PUT', 'route' => ['warehouses.update', $warehouse->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit
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
            </div>
            
        </div>
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

