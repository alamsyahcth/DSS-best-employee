<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
  $(".alert").delay(2000).slideUp(200, function() {
    $(this).alert('close');
  });
</script>