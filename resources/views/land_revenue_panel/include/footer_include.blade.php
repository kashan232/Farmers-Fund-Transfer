<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="{{asset('')}}assets/js/plugins/apexcharts.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/jsvectormap.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/world.js"></script>
<script src="{{asset('')}}assets/js/plugins/world-merc.js"></script>
<script src="{{asset('')}}assets/js/pages/dashboard-default.js"></script>
<script src="{{asset('')}}assets/js/plugins/popper.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/simplebar.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('')}}assets/js/fonts/custom-font.js"></script>
<script src="{{asset('')}}assets/js/pcoded.js"></script>
<script src="{{asset('')}}assets/js/plugins/feather.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="{{asset('select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
