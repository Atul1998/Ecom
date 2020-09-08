<?php 
 session_start();
 	require_once'config/connect.php';
 		if (!isset($_SAESSION['email'])& empty($_SESSION['email'])) {
 			header('location: login.php'); 		
 		}	
 		if (isset($_POST)& !empty($_POST)) {
		 			$name = mysqli_real_escape_string($connection, $_POST['categoryname']);
		 			$sql = "INSERT INTO category (name) VALUES ('$name')";
		 			$res = mysqli_query($connection, $sql);
		 			if ($res) {
		 				$smsg = "category Added";
		 			}
		 			else{
		 				$fmsg = "Failed Add category";
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
                        <h1 class="mt-4">Add Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">New category can be added hear</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Orders</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="productname">Category Name</label>
                                                <?php if(isset($fmsg)){?> <div class="alert alert-danger" role="alert"><?php echo $fmsg;?></div><?php } ?>
                                                <?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"><?php echo $smsg;?></div><?php } ?>
                                                <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Category Name">
                                            </div>
                                            <button type="Submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include'footer.php' ?>
    </body>
</html>
