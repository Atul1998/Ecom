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
                        <h1 class="mt-4">Address</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Address</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">Delivery Address</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Address</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address1</th>
                                                <th>Address2</th>
                                                <th>Mobile</th>
                                                <th>City</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address1</th>
                                                <th>Address2</th>
                                                <th>Mobile</th>
                                                <th>City</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                               if(isset($_GET['id']) & !empty($_GET['id'])){
                                                    $oid = $_GET['id'];
                                                }else{
                                                    header('location: my-account.php');
                                                }
                                                $sql = "SELECT o.id, o.totalprice, o.orderstatus, o.paymentmode, o.`timestamp`, u.city, u.mobile, u.address2, u.address1, u.firstname, u.lastname FROM orders o JOIN usersmeta u WHERE o.uid=u.uid  AND o.id='$oid' ORDER BY o.id DESC";
                                                $res = mysqli_query($connection, $sql); 
                                                $r = mysqli_fetch_assoc($res)
                                            ?>
                                            <tr>
                                                <td><?php echo $r['firstname']. " " . $r['lastname']; ?></td>
                                                <td><?php echo $r['address1']; ?></td>
                                                <td><?php echo $r['address2']; ?></td>
                                                <td><?php echo $r['mobile']; ?></a></td>
                                                <td><?php echo $r['city']; ?></td>
                                                <td>
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
