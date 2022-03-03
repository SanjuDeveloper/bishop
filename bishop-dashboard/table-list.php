<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between">
                            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                            <a role="button" onclick="fnExcelReport();" class="d-none my-3 d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export List</a>
                    </div>
                
<?php
$Db = "u162731619_pracer";
$user = "u162731619_root";
$pass = "pRacer@123";

$conn = mysqli_connect("localhost",$user,$pass,$Db);
$sql = mysqli_query($conn, "SELECT * FROM subscriber") or die(mysqli_error($conn));

date_default_timezone_set("Asia/Kolkata");
?>
                    <!-- DataTales Example -->
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
                                            <th>Subject</th>
                                            <th>Date-Time</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Subject</th>
                                            <th>Date-Time</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach(mysqli_fetch_all($sql, MYSQLI_ASSOC) as $subscriber){
                                            echo "<tr>
                                            <td>".$subscriber['name']."</td>
                                            <td>".$subscriber['email']."</td>
                                            <td>".$subscriber['phone']."</td>
                                            <td>".$subscriber['course']."</td>
                                            <td>".date("d/m/Y h:i a",strtotime($subscriber['created_at']))."</td>
                                            <td></td>
                                        </tr>";
                                        }
                                        ?>
                                        <!-- <tr>
                                            <td>Ashish Sinha</td>
                                            <td>ashishsinha786@gmail.com</td>
                                            <td>6516548156</td>
                                            <td>Enquery Form (CS)</td>
                                            <td>2011/04/25</td>
                                            <td>Lorem ipsum dolor sit amet, ia deserunt mollit anim id est laborum.</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>