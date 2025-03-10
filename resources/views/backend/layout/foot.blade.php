<!-- jquery 3.3.1 -->
<script src="{{ asset('backend/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>

<!-- bootstap bundle js -->
<script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>

<!-- slimscroll js -->
<script src="{{ asset('backend/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>

<!-- main js -->
<script src="{{ asset('backend/assets/libs/js/main-js.j') }}"></script>

<script src="{{ asset('backend/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/datatables/js/data-table.js') }}"></script>

<script src="{{ asset('backend/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('backend/assets/libs/js/main-js.js') }}"></script>
<script src="{{ asset('backend/') }}"></script>

<script src="{{ asset('https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js') }}"></script>

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js') }}"></script>
<script
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
</script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js') }}"></script>
<script>
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 300
    });
</script>

@yield('scripts')
