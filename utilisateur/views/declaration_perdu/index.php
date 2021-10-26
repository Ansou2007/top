<?php
		require('../../core/configuration.php');
		include '../../includes/navbar.php';
?>
<!-- Bordered table start -->
<section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bordered table</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p class="card-text">Add <code>.table-bordered</code> for borders on all sides of the table
                                and
                                cells. For
                                Inverse Dark Table, add <code>.table-dark</code> along with
                                <code>.table-bordered</code>.
                            </p>
                        </div>
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>RATE</th>
                                        <th>SKILL</th>
                                        <th>TYPE</th>
                                        <th>LOCATION</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>                                                                   
                                    <tr>
                                        <td class="text-bold-500">Tiffani Blogz</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">Animation</td>
                                        <td>Remote</td>
                                        <td>Austin,Texas</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
	include base_app.'/../includes/footer.php';
	?>