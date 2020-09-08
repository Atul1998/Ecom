<?php 
 session_start();
 require_once'config/connect.php';
 if (!isset($_SAESSION['email'])& empty($_SESSION['email'])) {
 	header('location: login.php');
 }
  if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($connection, $_POST['slider']);

		if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['sliderimage']['name'];
			$size = $_FILES['sliderimage']['size'];
			$type = $_FILES['sliderimage']['type'];
			$tmp_name = $_FILES['sliderimage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "image/";
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully";
						$sql = "INSERT INTO slider (name, thumb) VALUES ('$prodname', '$location$name')";
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: showslider.php');
						}else{
							$fmsg = "Failed to Create slider";
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

			$sql = "INSERT INTO products (name) VALUES ('$prodname')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: showslider.php');
			}else{
				$fmsg =  "Failed to Create slider";
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
                        <h1 class="mt-4">Add slider</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add slider/title</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">Add new slider to home page</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Orders</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <form method="post" enctype="multipart/form-data">
                                            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                                                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                                                            <div class="form-group">
                                                                <label for="productname">Title on slider</label>
                                                                <input type="text" class="form-control" name="slider" id="slider" placeholder="slider title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="productimage">Product Image</label>
                                                                <input type="file" class="form-control" name="sliderimage">
                                                                <br>
                                                                <p class="help-block">Only JPG?PNG files</p>
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
