@extends('layouts.app')

@section('content')
    <h3 class="page-title">Products</h3>
    
    {!! Form::model($product, ['method' => 'PUT', 'route' => ['products.update', $product->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('kode', 'Kode*', ['class' => 'control-label']) !!}
                    {!! Form::text('kode', old('kode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('kode'))
                        <p class="help-block">
                            {{ $errors->first('kode') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Product*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Harga*', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Harga produk']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('jenis', 'Jenis*', ['class' => 'control-label']) !!}
                    {!! Form::select('jenis', $jenis, old('jenis'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jenis'))
                        <p class="help-block">
                            {{ $errors->first('jenis') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('category', 'Category*', ['class' => 'control-label']) !!}
                    <select name="category" id="category" class="form-control">
                        <option value="">-- Pilih Kategory --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>{{ $category->kode . "\t - " . $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

