    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/bootstrap.min.css"; ?>">
    
    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/custom.css"; ?>">
    
    <!-- CSS DataTable-->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/dataTables.bootstrap4.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/jquery.dataTables.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/buttons.dataTables.min.css"; ?>">

    <!-- JS Bootstrap -->
    <script src="<?php echo base_url() . "assets/js/jquery-3.3.1.slim.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/popper.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/bootstrap.min.js"; ?>"></script>
    
    <!-- JS DataTable -->
    <script src="<?php echo base_url() . "assets/js/jquery-3.3.1.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/jquery.dataTables.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/dataTables.bootstrap4.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/dataTables.buttons.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/buttons.flash.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/jszip.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/pdfmake.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/vfs_fonts.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/buttons.html5.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "assets/js/buttons.print.min.js"; ?>"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ]
            });

            $('#dataTable2').DataTable({
                searching: false,
                paging: false,
                dom: 'Bfrtip',
                buttons: [
                    'pdf', 'print'
                ]
            });
        })
    </script>