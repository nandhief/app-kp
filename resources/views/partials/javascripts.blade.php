<script src="{{ asset('quickadmin/js') }}/jquery.min.js"></script>
<script src="{{ asset('datatables') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('datatables') }}/extenstion/js/dataTables.select.min.js"></script>
<script src="{{ asset('quickadmin/js') }}/jquery-ui.min.js"></script>
<script src="{{ asset('quickadmin/js') }}/bootstrap.min.js"></script>
<script src="{{ asset('quickadmin/js') }}/main.js"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>

@yield('javascript')