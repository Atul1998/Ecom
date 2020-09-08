<?php
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
	}else{
		header('location: products.php');
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
					$filepath = $location.$name;
					if(move_uploaded_file($tmp_name, $filepath)){
						$smsg = "Uploaded Successfully";
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
			$filepath = $_POST['filepath'];
		}	

		$sql = "UPDATE products SET name='$prodname', description='$description', catid='$category', price='$price', thumb='$filepath' WHERE id = $id";
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Product Updated";
		}else{
			$fmsg = "Failed to Update Product";
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
                        <h1 class="mt-4">Edit Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">All products can be edited hear</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Edit Products</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                                        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                                            <?php   
                                                $sql = "SELECT * FROM products WHERE id=$id";
                                                $res = mysqli_query($connection, $sql); 
                                                $r = mysqli_fetch_assoc($res); 
                                            ?>
                                            <form method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                              <input type="hidden" name="filepath" value="<?php echo $r['thumb']; ?>">
                                                <label for="Productname">Product Name</label>
                                                <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name" value="<?php echo $r['name']; ?>">
                                              </div>
                                              <div class="form-group">
                                                <label for="productdescription">Product Description</label>
                                                <textarea class="form-control" name="productdescription" rows="3"><?php echo $r['description']; ?></textarea>
                                              </div>

                                              <div class="form-group">
                                                <label for="productcategory">Product Category</label>
                                                <select class="form-control" id="productcategory" name="productcategory">
                                                <?php   
                                                    $catsql = "SELECT * FROM category";
                                                    $catres = mysqli_query($connection, $catsql); 
                                                    while ($catr = mysqli_fetch_assoc($catres)) {
                                                ?>
                                                    <option value="<?php echo $catr['id']; ?>" <?php if( $catr['id'] == $r['catid']){ echo "selected"; } ?>><?php echo $catr['name']; ?></option>
                                                <?php } ?>
                                                </select>
                                              </div>
                                              

                                              <div class="form-group">
                                                <label for="productprice">Product Price</label>
                                                <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price" value="<?php echo $r['price']; ?>">
                                              </div>
                                              <div class="form-group">
                                                <label for="productimage">Product Image</label>
                                                <?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
                                                <br>
                                                    <img src="<?php echo $r['thumb'] ?>" widht="100px" height="100px">
                                                    <a href="delprodimg.php?id=<?php echo $r['id']; ?>">Delete Image</a>
                                                <?php }else{ ?>
                                                <input type="file" name="productimage" id="productimage">
                                                <p class="help-block">Only jpg/png are allowed.</p>
                                                <?php } ?>
                                              </div>
                                              
                                              <button type="submit" class="btn btn-primary">Submit</button>
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
