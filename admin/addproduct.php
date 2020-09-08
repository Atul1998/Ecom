<?php 
 session_start();
 require_once'config/connect.php';
 if (!isset($_SAESSION['email'])& empty($_SESSION['email'])) {
 	header('location: login.php');
 }
  if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($connection, $_POST['productname']);
		$description = mysqli_real_escape_string($connection, $_POST['productdescription']);
		$category = mysqli_real_escape_string($connection, $_POST['productcategory']);
		$price = mysqli_real_escape_string($connection, $_POST['productprice']);


		if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['productimage']['name'];
			$size = $_FILES['productimage']['size'];
			$type = $_FILES['productimage']['type'];
			$tmp_name = $_FILES['productimage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "uploads/";
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully";
						$sql = "INSERT INTO products (name, description, catid, price, thumb) VALUES ('$prodname', '$description', '$category', '$price', '$location$name')";
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: products.php');
						}else{
							$fmsg = "Failed to Create Product";
						}
					}else{
						$fmsg = "Failed to Upload File";
					}
				}else{
					$fmsg = "Only JPG files are allowed and should be less that 1MB";
				}
			}else{
				$fmsg = "Please Select a File";
			}
		}else{

			$sql = "INSERT INTO products (name, description, catid, price) VALUES ('$prodname', '$description', '$category', '$price')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: products.php');
			}else{
				$fmsg =  "Failed to Create Product";
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
                        <h1 class="mt-4">Add Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">New products can be added hear</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Add Products</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <form method="post" enctype="multipart/form-data">
                                            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                                                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                                                            <div class="form-group">
                                                                <label for="productname">Product Name</label>
                                                                <input type="text" class="form-control" name="productname" id="productname" placeholder="Product Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="productdescription">Product Description</label>
                                                                <textarea class="form-control" name="productdescription" rows="3" placeholder="Product Description"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="productcategory">Product Category</label>
                                                                <select class="form-control" name="productcategory" id="productcategory">
                                                                    <option value="">-----Select Category-----</option>
                                                                    <?php 
                                                                   $sql = "SELECT * FROM category";
                                                                   $res = mysqli_query($connection, $sql);
                                                                   while ($r=mysqli_fetch_assoc($res)) {
                                                                   ?>
                                                                   <option value="<?php echo $r['id']?>"><?php echo $r['name']?></option>
                                                                <?php }?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="productprice">Product Price</label>
                                                                <input type="text" class="form-control" name="productprice" id="productpice" placeholder="Product Price">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="productimage">Product Image</label>
                                                                <input type="file" class="form-control" name="productimage">
                                                                <br>
                                                                <p class="help-block">Only JPG?PNG files, less than 1mb (210x283 pixels.)</p>
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
