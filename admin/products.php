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
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">All products will be vesible hear</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Products</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Thumbnale</th>
                                                <th>Category No</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Thumbnale</th>
                                                <th>Category No</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                               $sql = "SELECT * FROM products";
                                               $res = mysqli_query($connection, $sql);
                                               while ($r=mysqli_fetch_assoc($res)) {
                                               ?>
                                                <tr>
                                            <td><?php echo $r['name']; ?></td>
                                            <td><?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
                                                <br>
                                                    <img src="<?php echo $r['thumb'] ?>" widht="100px" height="100px">
                                                <?php }else{ echo "NO";} ?>
                                                   </td>
                                            <td><?php echo $r['catid']; ?></td>
                                            <td><a href="editproduct.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="delproduct.php?id=<?php echo $r['id']; ?>">Delete</a></td>
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
