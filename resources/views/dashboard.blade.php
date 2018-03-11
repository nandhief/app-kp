@extends('layouts.app')

@section('content')
	<h3 class="page-title">Dashboard</h3>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Transaksi
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="table">
							<thead>
								<tr>
									<th width="25">#</th>
									<th>Produk</th>
									<th width="25%">Cart</th>
								</tr>
							</thead>
							<tbody>
							@if (count($products) > 0)
								@php
									$no = 1;
								@endphp
								@foreach ($products as $product)
								<tr>
									<td class="text-center">{{ $no++ }}</td>
									<td>{{ strtoupper($product->name) }}</td>
									<td>
										{{ Form::open(['route' => ['home.cart', $product->id], 'method' => 'POST', 'class' => '']) }}
										<div class="input-group">
											{{ Form::text('qty', old('qty'), ['class' => 'form-control input-sm', 'placeholder' => 'Jumlah', 'maxlength' => '5', 'pattern' => '[0-9]+', 'required' => TRUE]) }}
											<div class="input-group-btn">
												{!! Form::button('<i class="fa fa-cart-plus"></i>', ['class' => 'btn btn-success btn-sm', 'type' => 'submit']) !!}
											</div>
										</div>
										{{ Form::close() }}
									</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="3">No entries in table</td>
								</tr>
							@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Cart
				</div>
				<div class="panel-body">
					@if (Session::has('cart'))
					{{ Form::open(['route' => 'checkout', 'method' => 'POST']) }}
					<div class="form-group">
						<label for="" class="text-muted">(Optional Data Pelanggan)</label>
						{{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name pelanggan']) }}
						{{ Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Alamat pelanggan']) }}
					</div>
					@endif
					<ul class="list-group">
						@if (Session::has('cart'))
						@foreach (Session::get('cart')->items as $data)
							<li class="list-group-item">{{ $data['item']['name'] }} <span class="label label-primary" style="float: right;">Rp {{ number_format($data['price'], 0,',','.') }}</span><span class="badge badge-warning">{{ $data['qty'] }}</span></li>
						@endforeach
							<li class="list-group-item list-group-item-danger"><strong>Grand Total  <span class="" style="float: right; padding-right: 5px;">Rp {{ number_format(session()->get('cart')->totalPrice, 0,',','.') }}</span></strong></li>
						@else
							<li class="list-group-item disabled">Tidak ada Transaksi</li>
						@endif
					</ul>
					@if (Session::has('cart'))
					{!! Form::button('<i class="fa fa-cart-arrow-down"></i> Checkout', ['name' => 'btn', 'value' => 'checkout', 'type' => 'submit', 'class' => 'btn btn-success']) !!}
					{!! Form::button('<i class="fa fa-trash"></i> Reset', ['name' => 'btn', 'value' => 'reset', 'type' => 'submit', 'class' => 'btn btn-warning']) !!}
					@endif
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body"></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body"></div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
	<script>
		$(document).ready(function () {
			$('#table').dataTable({
				responsive: true,
				"bLengthChange": false,
				"order": [[ 0, "asc" ]],
				"aoColumnDefs": [
					{
						'bSortable': false,
						'aTargets': [ 2 ]
					}
				]
			});
		});
	</script>
@endsection

@section('stylesheet')
	<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, table.dataTable tbody th, table.dataTable tbody td {
			padding: 0px;
		}
	</style>
@stop