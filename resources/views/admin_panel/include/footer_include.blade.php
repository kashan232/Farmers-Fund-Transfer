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
<!-- <script src="{{asset('')}}jquery.dataTables.min"></script> -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="{{asset('select2.min.js')}}"></script>

<!-- <script src="../assets/js/plugins/dataTables.min.js"></script>
    <script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>
     -->

<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
<script>
  // [ DOM/jquery ]
  var total, pageTotal;
  var table = $('#dom-jqry').DataTable({
  dom: 'Bfrtip', // Adds buttons, filtering input, table, info, pagination
  buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
});
  // [ column Rendering ]
  $('#colum-render').DataTable({
    dom: 'Bfrtip', // Adds buttons, filtering input, table, info, pagination
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

    columnDefs: [{
        render: function(data, type, row) {
          return data + ' (' + row[3] + ')';
        },
        targets: 0
      },
      {
        visible: false,
        targets: [3]
      }
    ]
  });
  // [ Multiple Table Control Elements ]
  $('#multi-table').DataTable({
    dom: '<"top"Biflp<"clear">>rt<"bottom"iflp<"clear">>'
  });
  // [ Complex Headers With Column Visibility ]
  $('#complex-header').DataTable({
    columnDefs: [{
      visible: false,
      targets: -1
    }]
  });
</script>
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
