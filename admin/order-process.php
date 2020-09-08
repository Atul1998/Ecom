<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php
if(isset($_POST) & !empty($_POST)){
		$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$id = filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);

			echo $ordprcsql = "INSERT INTO ordertracking (orderid, status, message) VALUES ('$id', '$status', '$message')";
			$ordprcres = mysqli_query($connection, $ordprcsql) or die(mysqli_error($connection));
			if($ordprcres){
				$ordupd = "UPDATE orders SET orderstatus='$status' WHERE id=$id";
				if(mysqli_query($connection, $ordupd)){
					header('location: orders.php');
				}
			}
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
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Payment Mode</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Payment Mode</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(isset($_GET['id']) & !empty($_GET['id'])){
                                                $oid = $_GET['id'];
                                            }else{
                                                header('location: orders.php');
                                            }
                                            $ordsql = "SELECT * FROM orders WHERE id='$oid'";
                                            $ordres = mysqli_query($connection, $ordsql);
                                            while($ordr = mysqli_fetch_assoc($ordres)){
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $ordr['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ordr['timestamp']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ordr['orderstatus']; ?>         
                                                </td>
                                                <td>
                                                    <?php echo $ordr['paymentmode']; ?>
                                                </td>
                                                <td>
                                                    INR <?php echo $ordr['totalprice']; ?>/-
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                        <form method="post">
                                            <div class="space30"></div>
                                                <label class="">Order Status </label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Status</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Dispatched">Dispatched</option>
                                                    <option value="Delivered">Delivered</option>
                                                </select>

                                                <div class="clearfix space20"></div>
                                                    <label>Message :</label>
                                                    <textarea class="form-control" name="message" cols="10"> </textarea>

                                                    <input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">      
                                                        <div class="space30"></div>
                                                        <br>
                                                    <input type="submit" class="btn btn-primary" value="Update Order Status">
                                        </form>     
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include'footer.php' ?>
    </body>
</html>
