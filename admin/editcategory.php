<?php 
 session_start();
 	require_once'config/connect.php';
 		if (!isset($_SAESSION['email'])& empty($_SESSION['email'])) {
 			header('location: login.php');
 		}	

 		if(isset($_GET)& !empty($_GET)){
 			$id = $_GET['id'];
 		}
 		else{
 			header('location: categories.php');
 		}
 		if (isset($_POST)& !empty($_POST)) {
 			        $id = mysqli_real_escape_string($connection, $_POST['id']);
		 			$name = mysqli_real_escape_string($connection, $_POST['categoryname']);
		 			$sql = "UPDATE category SET name = '$name' WHERE id = $id";
		 			$res = mysqli_query($connection, $sql);
		 			if ($res) {
		 				$smsg = "Category Edited";
		 			}
		 			else{
		 				$fmsq = "Failed Add category";
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
                        <h1 class="mt-4">Edit Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">All categories can be edited hear</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Edit Catagory</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <form method="post">
                                            <div class="form-group">
                                                <?php if(isset($fmsg)){?> <div class="alert alert-danger" role="alert"><?php echo $fmsg;?></div><?php } ?>
                                                <?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"><?php echo $smsg;?></div><?php } ?>
                                                <label for="productname">Category Name</label>
                                                <?php 
                                                   $sql = " SELECT * FROM category WHERE id = $id ";
                                                   $res = mysqli_query($connection, $sql);
                                                   $r = mysqli_fetch_assoc($res);
                                                 ?>
                                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                                <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Category Name" value="<?php echo $r['name']; ?>">
                                            </div>
                                            <button type="Submit" class="btn btn-defaut">Submit</button>
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
