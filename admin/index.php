<?php
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'header.php' ?>
    <body class="sb-nav-fixed">
        <?php include 'nav.php' ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Add Category</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="addCategory.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Add Products</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="addproduct.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">View Products</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="products.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Orders</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="orders.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                              <th>Customer</th>
                                              <th>Price</th>
                                              <th>Order Status</th>
                                              <th>Order Placed On</th>
                                              <th>Full Details</th>
                                              <th>Address</th>
                                              <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Customer</th>
                                              <th>Price</th>
                                              <th>Order Status</th>
                                              <th>Order Placed On</th>
                                              <th>Full Details</th>
                                              <th>Address</th>
                                              <th>Operations</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                          <?php   
                                            $sql = "SELECT o.id, o.totalprice, o.orderstatus, o.paymentmode, o.`timestamp`, u.firstname, u.lastname FROM orders o JOIN usersmeta u WHERE o.uid=u.uid ORDER BY o.id DESC";
                                            $res = mysqli_query($connection, $sql); 
                                            while ($r = mysqli_fetch_assoc($res)) {
                                          ?>
                                            <tr>
                                                <td><?php echo $r['firstname']. " " . $r['lastname']; ?></td>
                                                <td><?php echo $r['totalprice']; ?></td>
                                                <td><?php echo $r['orderstatus']; ?></td>
                                                <td><?php echo $r['timestamp']; ?></td>
                                                <td><a href="fulldetails.php?id=<?php echo $r['id']; ?>">Full Details</a></td>
                                                <td><a href="address.php?id=<?php echo $r['id']; ?>">Address</a></td>
                                                <td>
                                                  <?php if($r['orderstatus'] != 'Cancelled'){?>
                                                  <a href="order-process.php?id=<?php echo $r['id']; ?>">Process Order</a>
                                                  <?php }else{echo"Cancelled";} ?>
                                                </td>
                                              </tr>

                                              <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'footer.php'?>
    </body>
</html>
