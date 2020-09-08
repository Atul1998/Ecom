<?php 
	ob_start();
	require_once 'config/connect.php';
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
                        <h1 class="mt-4">Product Ordered Detail</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product Detail</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">Product Ordered full Detail</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Orders</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            if(isset($_GET['id']) & !empty($_GET['id'])){
                                                $oid = $_GET['id'];
                                            }else{
                                                header('location: my-account.php');
                                            }
                                            $ordsql = "SELECT * FROM orders WHERE id='$oid'";
                                            $ordres = mysqli_query($connection, $ordsql);
                                            $ordr = mysqli_fetch_assoc($ordres);

                                            $orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid='$oid' AND o.pid=p.id";
                                            $orditmres = mysqli_query($connection, $orditmsql);
                                            while($orditmr = mysqli_fetch_assoc($orditmres)){
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $orditmr['pquantity']; ?>
                                                </td>
                                                <td>
                                                    INR <?php echo $orditmr['productprice']; ?>/-
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
