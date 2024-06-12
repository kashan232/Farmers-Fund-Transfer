<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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
<script src="select2.min.js"></script>

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
      var table = $('#dom-jqry').DataTable();
      // [ column Rendering ]
      $('#colum-render').DataTable({
        columnDefs: [
          {
            render: function (data, type, row) {
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
        dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
      });
      // [ Complex Headers With Column Visibility ]
      $('#complex-header').DataTable({
        columnDefs: [
          {
            visible: false,
            targets: -1
          }
        ]
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

