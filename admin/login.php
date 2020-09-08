<?php 
session_start();
require_once'config/connect.php'; 
  if (isset($_POST) & !empty($_POST)) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection,$sql) or die (mysqli_eror($connection));
    $count = mysqli_num_rows($result);
    if($count==1){
        $_SESSION['email']=$email;
        header("location: index.php");
    }
    else{
        $fmsg = "Invalid login credentials";
    }
   } 
?>
  <?php  include'header.php';  ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">
                                        <?php if(isset($fmsg)){?> <div class="alert alert-danger" role="alert"><?php echo $fmsg;?></div><?php } ?>
                                        <form method="post">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input type="email" name="email" class="form-control py-4" value=""></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input type="password" name="password" class="form-control py-4" value=""></div>
                                           <center><button type="submit" class="btn btn-primary">Login</button></center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php include'footer.php' ?>
    </body>
</html>
