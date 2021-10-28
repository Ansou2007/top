<?php
		require('../../core/configuration.php');
		include '../../includes/navbar.php';
?>

   <!-- Basic Tables start -->
    <sect ion class="section">
        <div class="card">
            <div class="card-header">
                Jquery Datatable
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Dale</td>
                            <td>fringilla.euismod.enim@quam.ca</td>
                            <td>0500 527693</td>
                            <td>New Quay</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                       
                        
                       
                        <tr>
                            <td>Deacon</td>
                            <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                            <td>07740 599321</td>
                            <td>Karapınar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Aladdin</td>
                            <td>sem.ut@pellentesqueafacilisis.ca</td>
                            <td>0800 1111</td>
                            <td>Bothey</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        
                       
                        
                        <tr>
                            <td>Maxwell</td>
                            <td>diam@dapibus.org</td>
                            <td>0334 836 4028</td>
                            <td>Thane</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>Emmanuel</td>
                            <td>eget.lacus.Mauris@feugiatSednec.org</td>
                            <td>(016977) 8208</td>
                            <td>Saint-Remy-Geest</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </sect>
    <!-- FIN TABLE -->
	<script src="<?php echo base_url?>/includes/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url?>/includes/assets/js/bootstrap.bundle.min.js"></script>
    
	<script src="<?php echo base_url?>/includes/assets/vendors/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url?>/includes/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url?>/includes/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
	<script src="<?php echo base_url?>/includes/assets/vendors/fontawesome/all.min.js"></script>
	<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

    <script src="<?php echo base_url?>/includes/assets/js/mazer.js"></script>

	<?php
	include base_app.'/../includes/footer.php';
	?>