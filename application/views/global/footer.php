<!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/component/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/component/morrisjs/morris.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/component/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/component/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.js"></script>

    <script src="<?php echo base_url(); ?>assets/component/datepicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
    $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            autoclose: "true", 
            todayBtn: true
        });
    $(document).ready(function() {
        $('#dataTable').DataTable({
                responsive: true
        });
    });
    </script>