<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TUNAS AGRI FARM | Report @{{ date_format($start, "d-m-Y") . ' - ' . date_format($end, "d-m-Y") }}</title>
	<style>
		body {
			font-size:10;
		}
		.table {
			border-top-style: double;
			border-bottom-style: double;
			border-collapse: collapse;
			width: 100%;
		}
		th {
			border-bottom: 1px solid;
		}
		.right {
			text-align: right;
			padding-left: 15px;
			padding-right: 15px;
			clear: both;
		}
		.center {
			text-align: center;
			clear: both;
		}
		.left {
			text-align: left;
			padding-left: 15px;
			padding-right: 15px;
			clear: both;
		}
		.header,
		.footer {
			width: 100%;
			text-align: center;
		}
		.footer {
			bottom: 0px;
			position: fixed;
			content: counter(page, upper-roman);
		}
	</style>
</head>
<body>
	<h1 class="">TUNAS ANGRI FARM</h1>
	<br>
	<div style="margin-bottom: 5px;">TANGGAL : {{-- date_format($start, "d-m-Y") . ' SAMPAI ' . date_format($end, "d-m-Y") --}}</div>
	<table class="table">
		<thead>
			<tr>
				<th width="20">#</th>
				<th colspan="2">KATEGORI</th>
				<th width="100" class="right">TOTAL ITEM</th>
				<th class="right">TOTAL PRICE</th>
			</tr>
		</thead>
		<tbody>
		@php
			$no = 1;
		@endphp
		{{-- @foreach ($reports as $report) --}}
			<tr>
				<td class="center">@{{ $no++ }}</td>
				<td width="50">@{{ $report->kode }}</td>
				<td>@{{ $report->name }}</td>
				<td class="right">@{{ $report->ITEM }}</td>
				<td class="right">@{{ number_format($report->TOTAL, 0,',','.') }}</td>
			</tr>
			{{-- @if (count($reports) < $no) --}}
			<tr>
				<td colspan="4" style="border-top: 1px solid; padding-left: 10px;"><strong>GRAND TOTAL</strong></td>
				<td class="right" style="border-top: 1px solid;">@{{ number_format($report->GRANDTOTAL, 0,',','.') }}</td>
			</tr>
			{{-- @endif --}}
		{{-- @endforeach --}}
		</tbody>
	</table>
	<div class="footer">
		<p>Generate : @{{ \Carbon\Carbon::now() }}</p>
	</div>
</body>
</html>