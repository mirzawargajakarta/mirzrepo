<script>
    // Call the dataTables jQuery plugin
    // $(document).ready(function() {
    //     $('#dataTable').DataTable({
    //         "lengthChange": false,
    //         dom: 'Bfrtip',
    //         buttons: [{
    //             text: 'tambah data',
    //             action: function(e, dt, node, config) {
    //                 alert('Button activated');
    //             }
    //         }]
    //     });
    // });
    $('#dataTable').DataTable({
        "ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
        "info": true, // Will show "1 to n of n entries" Text at bottom
        "lengthChange": false // Will Disabled Record number per page});
        // 
    });
</script>