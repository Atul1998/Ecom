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
                        <h1 class="mt-4">Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">orders</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">Information of orders</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Orders</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
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
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Price</th>
                                                <th>Order Status</th>
                                                <th>Order Placed On</th>
                                                <th>Full Details</th>
                                                <th>Address</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   
                                            $sql = "SELECT o.id, o.totalprice, o.orderstatus, o.paymentmode, o.`timestamp`, u.firstname, u.lastname FROM orders o JOIN usersmeta u WHERE o.uid=u.uid ORDER BY o.id DESC";
                                            $res = mysqli_query($connection, $sql); 
                                            while ($r = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $r['id']; ?></th>
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
<?php include'footer.php' ?>
    </body>
</html>
