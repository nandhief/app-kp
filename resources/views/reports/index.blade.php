@extends('layouts.app')

@section('content')
    <h3 class="page-title">Report</h3>
    <div class="row">
        <div class="col-md-4">
            {{ Form::open(['method' => 'POST', 'target' => '_blank']) }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Laporan Penjualan
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('datepicker', 'Dari', ['class' => 'control-label']) !!}
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class=" form-control" name="start">
                            <span class="input-group-addon">sampai</span>
                            <input type="text" class=" form-control" name="end">
                        </div>
                    </div>
                    {!! Form::submit('Report', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('datepicker') }}/css/bootstrap-datepicker3.standalone.min.css">
@stop

@section('javascript')
    <script src="{{ asset('datepicker') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('datepicker') }}/locales/bootstrap-datepicker.id.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: "dd-mm-yyyy",
                weekStart: 1,
                endDate: "+infinity",
                todayBtn: "linked",
                clearBtn: true,
                language: "id",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    {{-- <script>
        window.route_mass_crud_entries_destroy = '{{ route('products.mass_destroy') }}';
    </script> --}}
@endsection