
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
                <h1 class="h3 mb-2 text-gray-800">Query Form Data</h1>
                <a role="button" onclick="fnExcelReport();" class="d-none my-3 d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export List</a>
        </div><!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>From</th>
                                <th>Date-Time</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>From</th>
                                <th>Date-Time</th>
                                <th>Typr</th>
                                <th>Message</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                require 'database.php';
                                $db = new bishop();
                                $db->Connect();
                                $Createquery = $db->getQuery(); 
                                foreach($Createquery as $data){ ?>
                                    <tr>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['phone'] ?></td>
                                        <td>Enquery Form (<?= $data['url'] ?>)</td>
                                        <td><?= $data['update_time'] ?></td>
                                        <td><?= $data['type'] ?>.</td>
                                        <td><?= $data['message'] ?>.</td>
                                     </tr> 

                                 <?php 
                                }
                                ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>