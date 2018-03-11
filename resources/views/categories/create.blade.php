@extends('layouts.app')

@section('content')
    <h3 class="page-title">Categories</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['categories.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Create
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kode', 'Kode*', ['class' => 'control-label']) !!}
                    {!! Form::text('kode', old('kode'), ['class' => 'form-control', 'placeholder' => 'Contoh: T001']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kode'))
                        <p class="help-block">
                            {{ $errors->first('kode') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nama*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nama kategori']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

