<script src="../assets/js/plugins/apexcharts.min.js"></script>
<script src="../assets/js/plugins/jsvectormap.min.js"></script>
<script src="../assets/js/plugins/world.js"></script>
<script src="../assets/js/plugins/world-merc.js"></script>
<script src="../assets/js/pages/dashboard-default.js"></script>
<script src="../assets/js/plugins/popper.min.js"></script>
<script src="../assets/js/plugins/simplebar.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/fonts/custom-font.js"></script>
<script src="../assets/js/pcoded.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>
<script src="../assets/js/plugins/dataTables.min.js"></script>
<script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
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
<script>
    layout_change('light');
</script>
<script>
    layout_sidebar_change('light');
</script>
<script>
    change_box_container('false');
</script>
<script>
    layout_caption_change('true');
</script>
<script>
    layout_rtl_change('false');
</script>
<script>
    preset_change("preset-1");
</script>